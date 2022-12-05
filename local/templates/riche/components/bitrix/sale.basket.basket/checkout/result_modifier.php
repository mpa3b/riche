<?php
    
    if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
        die();
    }
    
    use Bitrix\Currency\CurrencyManager;
    use Bitrix\Main\Context;
    use Bitrix\Main\Engine\CurrentUser;
    use Bitrix\Main\UserTable;
    use Bitrix\Sale\Basket;
    use Bitrix\Sale\Delivery\Services\Table;
    use Bitrix\Sale\Discount;
    use Bitrix\Sale\Fuser;
    use Bitrix\Sale\Internals\OrderPropsGroupTable;
    use Bitrix\Sale\Internals\OrderPropsVariantTable;
    use Bitrix\Sale\Internals\PaySystemActionTable;
    use Bitrix\Sale\Property;
    
    /** @var array $arParams */
    /** @var array $arResult */
    /** @global \CMain $APPLICATION */
    /** @global \CUser $USER */
    /** @global \CDatabase $DB */
    /** @var CBitrixComponentTemplate $this */
    
    $cart      = Basket::loadItemsForFUser(Fuser::getId(), Context::getCurrent()->getSite());
    $discounts = Discount::buildFromBasket($cart, new Discount\Context\Fuser($cart->getFUserId(true)));
    
    if (count($cart->getOrderableItems()) > 0) {
        
        $total    = 0;
        $currency = CurrencyManager::getBaseCurrency();
        
        $discounts->calculate();
        $discounts->setExecuteModuleFilter(['all', 'catalog', 'sale']);
        
        $cartDiscounts = $discounts->getApplyResult(true);
        
        $arResult['DISCOUNTS'] = $cartDiscounts;
        
        if (isset($cartDiscounts["PRICES"]['BASKET'])) {
            
            foreach ($arResult['ITEMS'] as &$group) {
                
                foreach ($group as &$arItem) {
                    
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
    
    if (CurrentUser::get()->getId()) {
        
        $arResult['USER'] = [
            'ID'    => CurrentUser::get()->getId(),
            'LOGIN' => CurrentUser::get()->getLogin(),
            'EMAIL' => CurrentUser::get()->getEmail(),
            'NAME'  => CurrentUser::get()->getFormattedName()
        ];
        
        $user = UserTable::getById(CurrentUser::get()->getId())->fetch();
        
        if (!empty($user['PERSONAL_PHONE'])) {
            
            $arResult['USER']['PHONE'] = $user['PERSONAL_PHONE'];
            
        }
        
    }
    
    $arResult['DELIVERY'] = Table::getList(
        [
            'filter' => [
                'ACTIVE'       => 'Y',
                '!=CLASS_NAME' => '\Bitrix\Sale\Delivery\Services\EmptyDeliveryService'
            ],
            'order'  => ['SORT' => 'DESC']
        
        ]
    )->fetchAll();
    
    $arResult['PAYSYSTEM'] = PaySystemActionTable::getList(
        [
            'filter' => ['ACTIVE' => 'Y'],
            'order'  => ['SORT' => 'DESC']
        ]
    )->fetchAll();
    
    $rPersons = \Bitrix\Sale\PersonType::getList(['filter' => ['ACTIVE' => 'Y']]);
    
    $persons = [];
    
    while ($person = $rPersons->fetch()) {
        
        $persons[$person['ID']] = $person;
        
    }
    
    $arResult['PERSONS']      = $persons;
    $arResult['PERSON_TYPES'] = array_column($persons, 'ID');
    
    $rOrderProperty = Property::getList(
        [
            'select' => ['*'],
            'group'  => ['ID'],
            'order'  => ['SORT' => 'ASC']
        ]
    );
    
    while ($arProperty = $rOrderProperty->fetch()) {
        
        if ($arProperty['TYPE'] == "ENUM") {
            
            $rPropertyValues = OrderPropsVariantTable::getList(
                [
                    'filter' => [
                        'ORDER_PROPS_ID' => $arProperty['ID']
                    ],
                    'group'  => ['ID'],
                    'order'  => ['SORT' => 'ASC']
                ]
            );
            
            $arProperty['OPTIONS'] = $rPropertyValues->fetchAll();
            
        }
        
        $arProperty['PERSON_TYPE'] = $arResult['PERSONS'][$arProperty['PERSON_TYPE_ID']]['CODE'];
        
        $arResult['ORDER_PROPERTIES'][] = $arProperty;
        
    }
    
    $arResult['ORDER_PROPERTIES_GROUPS'] = OrderPropsGroupTable::getList()->fetchAll();
