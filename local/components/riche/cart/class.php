<?php

/** @global \CMain $APPLICATION */
/** @global \CUser $USER */
/** @global \CDatabase $DB */

namespace Riche;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Catalog\Product\Basket as CatalogProvider;
use Bitrix\Currency\CurrencyManager;
use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Loader;
use Bitrix\Sale\Basket;
use Bitrix\Sale\DiscountCouponsManager;
use Bitrix\Sale\Fuser;
use CCurrencyLang;

/**
 * Класс компонента корзины с AJAX и Controllerable
 */
class Cart extends \CBitrixComponent implements Controllerable
{

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
    private Basket $cart;
    /**
     * Валюта
     *
     * @var string
     */
    private string $currency;
    /**
     * Поставщик каталога
     *
     * @var string
     */
    private string $catalogProvider;

    /**
     * Выполняем компонент
     *
     * @return void
     */
    public function executeComponent(): void
    {

        Loader::includeModule('sale');

        $this->currency        = CurrencyManager::getBaseCurrency();
        $this->catalogProvider = CatalogProvider::getDefaultProviderName();

        $fUser      = Fuser::getId();
        $this->cart = Basket::loadItemsForFUser($fUser, $this->getSiteId());

        $this->includeComponentTemplate(); // сюда будет уходить скорее всего только статическая заглушка

    }

    /**
     * Для работы Controllerable
     *
     * @inheritDoc
     *
     * @return array
     */
    public function configureActions(): array
    {

        // Сбрасываем фильтры по-умолчанию (ActionFilter\Authentication и ActionFilter\HttpMethod)
        // Предустановленные фильтры находятся в папке /bitrix/modules/main/lib/engine/actionfilter/

        return [
            'get'      => [
                'prefilters' => [
                    new ActionFilter\Cors(),
                    new ActionFilter\Csrf()
                ]
            ],
            'add'      => [
                'prefilters' => [
                    new ActionFilter\Cors(),
                    new ActionFilter\Csrf()
                ]
            ],
            'delete'   => [
                'prefilters' => [
                    new ActionFilter\Cors(),
                    new ActionFilter\Csrf()
                ]
            ],
            'update'   => [
                'prefilters' => [
                    new ActionFilter\Cors(),
                    new ActionFilter\Csrf()
                ]
            ],
            'postpone' => [
                'prefilters' => [
                    new ActionFilter\Cors(),
                    new ActionFilter\Csrf()
                ]
            ],
            'coupon'   => [
                'prefilters' => [
                    new ActionFilter\Cors(),
                    new ActionFilter\Csrf()
                ]
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
     *
     * @throws \Bitrix\Main\NotSupportedException
     */
    public function addAction(int $id, int $quantity = 1): void
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
     *
     * @throws \Bitrix\Main\ArgumentException
     */
    public function deleteAction(int $id): void
    {

        if ($item = $this->cart->getExistsItem(self::catalog, $id)) {

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

        if ($item = $this->cart->getExistsItem(self::catalog, $id)) {

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

        if ($item = $this->cart->getExistsItem(self::catalog, $id)) {

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
    public function couponAction(string $coupon): void
    {

        if ($coupon && DiscountCouponsManager::isExist($coupon)) {

            DiscountCouponsManager::add($coupon);

        }

        $this->returnCart();

    }

    /**
     * Возвращает массив состава корзины
     *
     * @return array
     *
     * @throws \Bitrix\Main\ArgumentNullException
     */
    private function returnCart()
    {

        $cart = [
            'total'      => CCurrencyLang::CurrencyFormat($this->cart->getPrice(), $this->currency),
            'total_base' => CCurrencyLang::CurrencyFormat($this->cart->getBasePrice(), $this->currency),
            'count'      => count($this->cart->getQuantityList()),
        ];

        /* @var $item \Bitrix\Sale\BasketItem */

        foreach ($this->cart as $item) {

            $id = $item->getId();

            // @todo выяснить где тут IBLOCK_ELEMENT_ID чтобы получать картинку

            $cart['items'][$id] = [
                'product_id'       => $item->getProductId(),
                'name'             => $item->getField('NAME'),
                'quantity'         => intval($item->getQuantity()),
                'base_price'       => CCurrencyLang::CurrencyFormat($item->getBasePrice(), $this->currency),
                'price'            => CCurrencyLang::CurrencyFormat($item->getPrice(), $this->currency),
                'discount'         => CCurrencyLang::CurrencyFormat($item->getDiscountPrice(), $this->currency),
                'total'            => CCurrencyLang::CurrencyFormat($item->getFinalPrice(), $this->currency),
                'discount_percent' => $item->getDiscountPricePercent(),
                'available'        => $item->canBuy(),
                'delay'            => $item->isDelay()
            ];

            $cart['items'][$id]['images'] = [
                'mobile'  => $this->getBasketItemImage($id, 'mobile'),
                'desktop' => $this->getBasketItemImage($id, 'desktop'),
            ];

        }

        return $cart;

    }

    private function getBasketItemImage($id)
    {



    }

}
