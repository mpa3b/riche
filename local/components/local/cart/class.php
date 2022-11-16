<?php

/** @global \CMain $APPLICATION */
/** @global \CUser $USER */
/** @global \CDatabase $DB */

namespace Local;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Iblock\ElementTable;
use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Engine\Response\ResizedImage;
use Bitrix\Main\Loader;
use Bitrix\Sale\Basket;
use Bitrix\Sale\DiscountCouponsManager;
use Bitrix\Sale\Fuser;
use CCurrencyLang;

/**
 * Класс компонента корзины с AJAX и Controllerable
 *
 * @link https://verstaem.com/ajax/new-bitrix-ajax/
 * @link https://machaon-dev.github.io/blog/posts/bitrix-ajax-controllers/
 * @link https://prominado.ru/blog/novye-ajax-zaprosy-v-bitrix/
 * @link https://verstaem.com/ajax/new-bitrix-ajax/
 * @link https://yunaliev.ru/2010/02/bitrix-ajax/
 *
 */
class Cart extends \CBitrixComponent implements Controllerable
{

    /**
     * @var array Выхлоп корзины
     */
    private array $output;

    public function onPrepareComponentParams($params)
    {

        return $params;

    }

    /**
     * Константа модуля каталога
     *
     * @todo как бы это получать, а не задавать?
     */
    const catalog = 'catalog';
    /**
     * Объект корзины
     *
     * @var \Bitrix\Sale\Basket
     */
    public $cart;
    /**
     * Валюта
     *
     * @var string
     */
    public string $currency;
    /**
     * Поставщик каталога
     *
     * @var string
     */
    public string $catalogProvider;

    /**
     * Выполняем компонент
     *
     * @return void
     */
    public function executeComponent() : void
    {

        if (Loader::includeModule('sale')) {

            $this->getCart();

            $this->includeComponentTemplate(); // сюда будет уходить скорее всего только статическая заглушка

        }

    }

    /**
     * Для работы Controllerable
     *
     * @inheritDoc
     * @return array
     */
    public function configureActions() : array
    {

        // Сбрасываем фильтры по-умолчанию (ActionFilter\Authentication и ActionFilter\HttpMethod)
        // Предустановленные фильтры находятся в папке /bitrix/modules/main/lib/engine/actionfilter/

        $filters = [
            new ActionFilter\Cors(),
            new ActionFilter\Csrf(),
            new ActionFilter\HttpMethod(
                [
                    ActionFilter\HttpMethod::METHOD_GET,
                    ActionFilter\HttpMethod::METHOD_POST
                ]
            )
        ];

        return [
            'get'      => [
                'prefilters' => $filters
            ],
            'add'      => [
                'prefilters' => $filters
            ],
            'delete'   => [
                'prefilters' => $filters
            ],
            'update'   => [
                'prefilters' => $filters
            ],
            'postpone' => [
                'prefilters' => $filters
            ],
            'coupon'   => [
                'prefilters' => $filters
            ]
        ];

    }

    /**
     * Добавление товара
     *
     * @param int $id       товар
     * @param int $quantity количество
     *
     * @return void
     * @throws \Bitrix\Main\NotImplementedException
     * @throws \Bitrix\Main\ArgumentNullException
     * @throws \Bitrix\Main\ArgumentTypeException
     * @throws \Bitrix\Main\ArgumentOutOfRangeException
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\NotSupportedException
     */
    public function addAction(int $id, int $quantity = 1) : void
    {

        if ($item = $this->cart->getItemById($id)) {

            $item->setField(
                'QUANTITY',
                $item->getField('QUANTITY') + $quantity
            );

        }
        else {

            $item = $this->cart->createItem(self::catalog, $id);

            $item->setFields(
                [
                    'QUANTITY'               => $quantity,
                    'CURRENCY'               => $this->currency,
                    'LID'                    => $this->getSiteId(),
                    'PRODUCT_PROVIDER_CLASS' => $this->catalogProvider
                ]
            );

        }

        $item->save();

        $this->returnCart();

    }

    /**
     * Удаление товара
     *
     * @param int $id
     *
     * @return void
     * @return void
     * @throws \Bitrix\Main\ArgumentNullException
     * @throws \Bitrix\Main\ArgumentOutOfRangeException
     * @throws \Bitrix\Main\NotImplementedException
     * @throws \Bitrix\Main\ObjectNotFoundException
     * @throws \Bitrix\Main\ArgumentException
     */
    public function deleteAction(int $id) : void
    {

        if ($item = $this->cart->getItemById($id)) {

            $item->delete();

        }

        $this->returnCart();

    }

    /**
     * Обновление товара
     *
     * @param int $id
     * @param int $quantity
     *
     * @return void
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\ArgumentNullException
     * @throws \Bitrix\Main\ArgumentOutOfRangeException
     * @throws \Bitrix\Main\NotImplementedException
     */
    public function updateAction(int $id, int $quantity)
    {

        if ($item = $this->cart->getItemById($id)) {

            $item->setField('QUANTITY', $quantity);

        }

        $this->returnCart();

    }

    /**
     * Отложить товар
     *
     * @param int $id
     *
     * @throws \Bitrix\Main\ArgumentNullException
     * @throws \Bitrix\Main\ArgumentOutOfRangeException
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\NotImplementedException
     */
    public function postponeAction(int $id)
    {

        if ($item = $this->cart->getItemById($id)) {

            $item->setField('DELAY', true);

        }

        $this->returnCart();

    }

    /**
     * Добавление купона
     *
     * @param string $coupon
     *
     * @return void
     */
    public function couponAction(string $coupon) : void
    {

        if ($coupon && DiscountCouponsManager::isExist($coupon)) {

            DiscountCouponsManager::add($coupon);

        }

        $this->returnCart();

    }

    private function getCart() : void
    {

        $this->cart = Basket::loadItemsForFUser(Fuser::getId(), $this->getSiteId());

    }

    /**
     * Возвращает массив состава корзины
     *
     * @return array|false|string
     * @throws \Bitrix\Main\ArgumentNullException
     */
    private function returnCart()
    {

        $this->prepareCart();
        $this->getCartImages();

        return json_encode($this->output);

    }

    private function prepareCart()
    {

        $this->output = [
            'total'      => CCurrencyLang::CurrencyFormat($this->cart->getPrice(), $this->currency),
            'total_base' => CCurrencyLang::CurrencyFormat($this->cart->getBasePrice(), $this->currency),
            'count'      => count($this->cart->getQuantityList()),
        ];

        /* @var $item \Bitrix\Sale\BasketItem */

        foreach ($this->cart as $item) {

            $this->output['items'][$item->getId()] = [
                'id'         => $item->getId(),
                'product_id' => $item->getProductId(),
                'name'       => $item->getField('NAME'),
                'quantity'   => $item->getQuantity(),
                'available'  => $item->canBuy(),
                'delay'      => $item->isDelay(),
                'base_price' => CCurrencyLang::CurrencyFormat($item->getBasePrice(), $this->currency),
                'price'      => CCurrencyLang::CurrencyFormat($item->getPrice(), $this->currency),
                'discount'   => CCurrencyLang::CurrencyFormat($item->getDiscountPrice(), $this->currency),
                'total'      => CCurrencyLang::CurrencyFormat($item->getFinalPrice(), $this->currency)
            ];

        }

        return $this->output;

    }

    private function getCartImages()
    {

        $rItems = ElementTable::getList(
            [
                'select' => [
                    'ID',
                    'PREVIEW_PICTURE'
                ],
                'filter' => [
                    'ID' => array_column((array) $this->output['items'], 'product-id')
                ]
            ]
        );

        while ($item = $rItems->fetch()) {

            $this->output['items'][$item['ID']]['images'] = [
                'preload' => ResizedImage::createByFileId($item['PREVIEW_PICTURE'], 24, 24),
                'mobile'  => ResizedImage::createByFileId($item['PREVIEW_PICTURE'], 48, 48),
                'desktop' => ResizedImage::createByFileId($item['PREVIEW_PICTURE'], 64, 64)
            ];

        }

    }

}

//\Bitrix\Main\Engine\Response\ResizedImage::createByImageId($imageId, 100, 100);
