<?php
    
    if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
        die();
    }
    
    use Bitrix\Currency\CurrencyManager;
    use Bitrix\Main\Context;
    use Bitrix\Sale\Basket;
    use Bitrix\Sale\Discount;
    use Bitrix\Sale\Fuser;
    
    /** @var array $arParams */
    /** @var array $arResult */
    /** @global \CMain $APPLICATION */
    /** @global \CUser $USER */
    /** @global \CDatabase $DB */
    /** @var CBitrixComponentTemplate $this */
    
    $cart      = Basket::loadItemsForFUser(Fuser::getId(), Context::getCurrent()->getSite());
    $discounts = Discount::buildFromBasket($cart, new Discount\Context\Fuser($cart->getFUserId(true)));
    
    $products = [];
    
    if (count($cart->getOrderableItems()) > 0) {
        
        $total    = 0;
        $currency = CurrencyManager::getBaseCurrency();
        
        $discounts->calculate();
        $discounts->setExecuteModuleFilter(['all', 'catalog', 'sale']);
        
        $cartDiscounts = $discounts->getApplyResult(true);
        
        if (isset($cartDiscounts["PRICES"]['BASKET'])) {
            
            foreach ($arResult['ITEMS'] as &$group) {
                
                foreach ($group as &$arItem) {
                    
                    $products[] = $arItem['ID'];
                    
                    $id       = $arItem['ID'];
                    $price    = $cartDiscounts["PRICES"]['BASKET'][$id]["PRICE"];
                    $discount = $cartDiscounts["PRICES"]['BASKET'][$id]["DISCOUNT"];
                    
                    $total += $cartDiscounts["PRICES"]['BASKET'][$id]["PRICE"] * $arItem['QUANTITY'];
                    
                    $arItem['PRICE']              = $price;
                    $arItem['DISCOUNT']           = $discount;
                    $arItem['SUM_VALUE']          = $price * $arItem['QUANTITY'];
                    $arItem['SUM_DISCOUNT_PRICE'] = $discount;
                    
                    $arItem['PRICE_FORMATED']              = CCurrencyLang::CurrencyFormat($price, $currency);
                    $arItem['SUM_DISCOUNT_PRICE_FORMATED'] = CCurrencyLang::CurrencyFormat($discount, $currency);
                    $arItem['SUM']                         = CCurrencyLang::CurrencyFormat($price * $arItem['QUANTITY'], $currency);
                    $arItem['DISCOUNT_FORMATED']           = CCurrencyLang::CurrencyFormat($discount, $currency);
                    
                }
                
            }
        }
        
        $arResult['allSum']          = $total;
        $arResult['allSum_FORMATED'] = CCurrencyLang::CurrencyFormat($total, $currency);
        
    }
    
    //region SKU
    
    foreach ($arResult['ITEMS'] as &$group) {
        
        foreach ($group as &$arItem) {
            
            if ($arItem['PROPS']) {
                
                foreach ($arItem['PROPS'] as $code => &$itemProperty) {
                    
                    foreach ($arItem['SKU_DATA'] as $property) {
                        
                        foreach ($property['VALUES'] as $value) {
                            
                            if ($value['XML_ID'] == $itemProperty['VALUE']) {
                                
                                $itemProperty['VALUE'] = $value['NAME'];
                                
                            }
                            
                        }
                        
                    }
                    
                }
                
            }
            
        }
        
    }
    
    //endregion
