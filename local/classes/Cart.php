<?php
    
    namespace Local;
    
    global $USER, $APPLICATION;
    
    use AkBars\Template;
    use Bitrix\Catalog\ProductTable;
    use Bitrix\Currency\CurrencyManager;
    use Bitrix\Main\Application;
    use Bitrix\Main\Loader;
    use Bitrix\Sale\Basket;
    use Bitrix\Sale\Discount;
    use CCurrencyLang;
    
    class Cart
    {
        
        private static $request;
        private static $site;
        
        private static $currency;
        private static $fUserID;
        
        const MODULE   = 'catalog';
        const PROVIDER = 'CCatalogProductProvider';
        const UNIT     = 'товар';
        
        private static $cart;
        private static $total;
        
        public function __construct()
        {
            
            Loader::includeModule("sale");
            
            self::$request  = Application::getInstance()->getContext()->getRequest();
            self::$site     = Application::getInstance()->getContext()->getSite();
            self::$currency = CurrencyManager::getBaseCurrency();
            
            self::$cart  = self::getCart();
            self::$total = self::getCartTotal();
            
            return self::$total;
            
        }
        
        private static function getCart()
        {
            
            return Basket::loadItemsForFUser(self::$fUserID, self::$site);
            
        }
        
        private static function getCartTotal()
        {
            
            $discounts = Discount::buildFromBasket(
                self::$cart->getOrderableItems(),
                new Discount\Context\Fuser(self::$fUserID)
            );
            
            $discounts->calculate();
            
            $cartDiscounts = $discounts->getApplyResult(true);
            
            $items = [];
            $total = 0;
            
            foreach (self::$cart->getOrderableItems() as $item) {
                
                $id   = $item->getProductId();
                $code = $item->getId();
                
                $itemData = [
                    'id'         => $id,
                    'name'       => $item->getField('NAME'),
                    'quantity'   => $item->getQuantity(),
                    'availiable' => $item->canBuy(),
                    'delay'      => $item->isDelay(),
                    'price'      => CCurrencyLang::CurrencyFormat($item->getPrice(), self::$currency),
                    'full_price' => CCurrencyLang::CurrencyFormat($item->getBasePrice(), self::$currency),
                    'discount'   => CCurrencyLang::CurrencyFormat($item->getDiscountPrice(), self::$currency),
                    'total'      => CCurrencyLang::CurrencyFormat($item->getFinalPrice(), self::$currency),
                    'message'    => Template::pluralUnits($item->getQuantity(), self::UNIT),
                    'measure'    => ProductTable::getCurrentRatioWithMeasure($item->getId())
                ];
                
                if (isset($cartDiscounts["PRICES"]['BASKET'][$code])) {
                    
                    $total += $cartDiscounts["PRICES"]['BASKET'][$code]["PRICE"] * $item->getQuantity();
                    
                    $itemData['price'] = CCurrencyLang::CurrencyFormat($cartDiscounts["PRICES"]['BASKET'][$code]["PRICE"], self::$currency);
                    $itemData['total'] = CCurrencyLang::CurrencyFormat($cartDiscounts["PRICES"]['BASKET'][$code]["PRICE"] * $item->getQuantity(), self::$currency);
                    
                }
                else {
                    
                    $total += $item->getFinalPrice();
                    
                }
                
            }
            
            $items[$id] = $itemData;
            
            $result = [
                'items'      => $items,
                'price'      => CCurrencyLang::CurrencyFormat($total, self::$currency),
                'full_price' => CCurrencyLang::CurrencyFormat((self::$cart->getBasePrice()), self::$currency),
                'lines'      => count($items),
                'elements'   => array_column($items, 'id'),
                'message'    => Template::pluralUnits(count($items), self::UNIT)
            ];
            
            return $result;
            
        }
        
        public static function add($id, $quantity)
        {
            
            if ($item = self::$cart->getExistsItem(self::MODULE, $id)) {
                
                $quantityPrevious = $item->getField('QUANTITY');
                
                $quantity = $quantityPrevious + $quantity;
                
                $item->setField('QUANTITY', $quantity);
                
            }
            else {
                
                $item = self::$cart->createItem(self::MODULE, $id);
                
                $item->setFields(
                    [
                        'QUANTITY'               => $quantity,
                        'CURRENCY'               => self::$currency,
                        'LID'                    => self::$site,
                        'PRODUCT_PROVIDER_CLASS' => self::PROVIDER,
                    ]
                );
                
            }
            
            self::$cart->save();
            
        }
        
        public static function update($id, $quantity)
        {
            
            if ($item = self::$cart->getExistsItem(self::MODULE, $id)) {
                
                $item->setField('QUANTITY', $quantity);
                
                self::$cart->save();
                
            }
            
        }
        
        public static function delete($id)
        {
            
            if ($item = self::$cart->getExistsItem(self::MODULE, $id)) {
                
                $item->delete();
                
                self::$cart->save();
                
            }
            
        }
        
        public static function postpone($id)
        {
            
            if ($item = self::$cart->getExistsItem(self::MODULE, $id)) {
                
                $item->setField('DELAY', true);
                
            }
            
        }
        
    }
