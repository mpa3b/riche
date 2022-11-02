<?php

    /** @global \CMain $APPLICATION */
    /** @global \CUser $USER */
    /** @global \CDatabase $DB */

    namespace Local;

    if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
        die();
    }

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

        public function onPrepareComponentParams($params)
        {

            return $params;

        }

        /**
         * Константа модуля каталога
         * @todo как бы это получать, а не задавать?
         */
        const catalog = 'catalog';

        /**
         * Объект корзины
         * @var \Bitrix\Sale\Basket
         */
        private Basket $cart;
        /**
         * Валюта
         * @var string
         */
        private string $currency;
        /**
         * Поставщик каталога
         * @var string
         */
        private string $catalogProvider;

        /**
         * Выполняем компонент
         * @return void
         */
        public function executeComponent() : void
        {

            $this->initCart();

            $this->includeComponentTemplate(); // сюда будет уходить скорее всего только статическая заглушка

        }

        /**
         * Для работы Controllerable
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

        private function initCart() : void
        {

            if (Loader::includeModule('sale')) {

                $this->cart = Basket::loadItemsForFUser(Fuser::getId(), $this->getSiteId());

            }

        }

        /**
         * Возвращает массив состава корзины
         * @return array
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
                    'preload' => $this->getBasketItemImage($id, '32x32', BX_RESIZE_IMAGE_EXACT),
                    'mobile'  => $this->getBasketItemImage($id, '48x48', BX_RESIZE_IMAGE_EXACT),
                    'tablet'  => $this->getBasketItemImage($id, '64x64', BX_RESIZE_IMAGE_EXACT),
                    'desktop' => $this->getBasketItemImage($id, '96x96', BX_RESIZE_IMAGE_EXACT),
                ];

            }

            return $cart;

        }

        private function getSizes(string $size)
        {

            $dimensions = explode($size, 'x');

            $sizes = [
                'width'  => $dimensions[0],
                'height' => $dimensions[1],
            ];

            return $sizes;

        }

        private function getBasketItemImage(int $id, string $size, mixed $mode)
        {

            if (!$id) {
                return false;
            }
            if (!$size) {

                $sizes = [
                    'width'  => 64,
                    'height' => 64
                ];

            }
            else {

                $sizes = self::getSizes($size);

            }
            if (!$mode) {

                $mode = BX_RESIZE_IMAGE_EXACT;

            }

            $imageId = 0;

            $image = \CFile::ResizeImageGet(
                $imageId,
                $sizes,
                $mode,
                false,
                [],
                ''
            );

            return $image;

        }

    }

    //\Bitrix\Main\Engine\Response\ResizedImage::createByImageId($imageId, 100, 100);
