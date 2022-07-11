<?php
    
    namespace Local;
    
    use Bitrix\Currency\CurrencyManager as Currency;
    use Bitrix\Main\Config\Option;
    use Bitrix\Main\Context;
    use Bitrix\Main\Engine\CurrentUser;
    use Bitrix\Main\Loader;
    use Bitrix\Sale\Basket;
    use Bitrix\Sale\Delivery\Services\Manager as Delivery;
    use Bitrix\Sale\Delivery\Services\Manager\Services\EmptyDeliveryService;
    use Bitrix\Sale\Fuser;
    use Bitrix\Sale\Order;
    use Bitrix\Sale\PaySystem\Manager as PaySystem;
    use CUser;
    use function NormalizePhone;
    use function randString;
    
    class OrderSave
    {
        
        private static $FuserID;
        private static $site;
        private static $currency;
        
        private static $data;
        
        private static $cart;
        private static $order;
        
        public static function createOrder($data) : array
        {
            
            Loader::includeModule("catalog");
            Loader::includeModule("sale");
            
            self::$site     = Context::getCurrent()->getSite();
            self::$currency = Currency::getBaseCurrency();
            self::$FuserID  = Fuser::getId();
            
            self::$data = self::prepareOrderData($data);
            self::$cart = self::getCart();
            
            return self::saveOrder();
            
        }
        
        private static function prepareOrderData($request) : array
        {
            
            $data = $request['data'];
            
            $orderData = [
                'NAME'        => $data['NAME'],
                'EMAIL'       => $data['EMAIL'],
                'PHONE'       => $data['PHONE'],
                'PERSON_TYPE' => $data['PERSON_TYPE'],
                'DELIVERY'    => $data['DELIVERY'],
                'STOCK'       => $data['STOCK'],
                'PAYSYSTEM'   => $data['PAYSYSTEM'],
            ];
            
            return $orderData;
            
        }
        
        private static function saveOrder() : array
        {
            
            $result = false;
            
            if (self::$cart->getPrice() > 0) {
                
                if (self::$order = Order::create(self::$site, self::getUserID(), self::$currency)) {
                    
                    self::$order->setPersonTypeId(self::$data['PERSON_TYPE']);
                    
                    self::$order->setBasket(self::$cart);
                    
                    self::createShipment();
                    
                    self::createPayment();
                    
                    self::setOrderProperties();
                    
                    self::$order->doFinalAction(true);
                    
                    $orderSave = self::$order->save();
                    
                    if ($orderSave->isSuccess()) {
                        
                        $data        = [];
                        $orderFields = Order::load(self::$order->getId())->getFieldValues();
                        
                        foreach ($orderFields as $code => $value) {
                            
                            if (!empty($value)) {
                                
                                $data[strtolower($code)] = $value;
                                
                            }
                            
                        }
                        
                        $result = [
                            'success' => true,
                            'order'   => $data
                        ];
                        
                    } else {
                        
                        $result = [
                            'success' => false,
                            'errors'  => $orderSave->getErrorMessages()
                        ];
                        
                    }
                    
                }
                
            } else {
                
                $result = [
                    'success' => false,
                    'errors'  => 'Empty cart'
                ];
                
            }
            
            return $result;
            
        }
        
        private static function getUserID() : int
        {
            
            if (CurrentUser::get()->getId()) {
                
                $id = CurrentUser::get()->getId();
                
            } else {
                
                $id = self::createUserAccount();
                
            }
            
            return $id;
            
        }
        
        private static function createUserAccount() : int
        {
            
            global $USER;
            global $APPLICATION;
            
            $data = self::$data;
            
            $email = isset($data['EMAIL']) ? trim((string) $data['EMAIL']) : '';
            
            if (empty($email)) {
                
                $login = NormalizePhone((string) $data['PHONE'], 7);
                
            } else {
                
                $pos = strpos($email, '@');
                
                if ($pos !== false) {
                    
                    $login = substr($email, 0, $pos);
                    
                }
                
            }
            
            if (strlen($login) > 32) {
                
                $login = substr($login, 0, 32);
                
            }
            
            if ($account = CUser::GetByLogin($login)->Fetch()) {
                
                $id = $account['ID'];
                
            } else {
                
                $name = $lastname = '';
                
                $fio = isset($data['NAME']) ? trim((string) $data['NAME']) : '';
                
                if ($fio) {
                    
                    [$name, $lastname] = explode(' ', $fio);
                    
                }
                
                $groups = [];
                
                $defaultGroups = Option::get('main', 'new_user_registration_def_group', '');
                
                if (!empty($defaultGroups)) {
                    
                    $groups = explode(',', $defaultGroups);
                    
                }
                
                $arPolicy = $USER->GetGroupPolicy($groups);
                
                $passwordMinLength = (int) $arPolicy['PASSWORD_LENGTH'] > 0 ? (int) $arPolicy['PASSWORD_LENGTH'] : 6;
                
                $passwordChars = [
                    'abcdefghijklnmopqrstuvwxyz',
                    'ABCDEFGHIJKLNMOPQRSTUVWXYZ',
                    '0123456789'
                ];
                
                if ($arPolicy['PASSWORD_PUNCTUATION'] === 'Y') {
                    
                    $passwordChars[] = ",.<>/?;:'\"[]{}\|`~!@#\$%^&*()-_+=";
                    
                }
                
                $password = $passwordConfirm = randString($passwordMinLength + 2, $passwordChars);
                
                if (!$email) {
                    
                    $email = $login . '@clients.' . SITE_SERVER_NAME;
                    
                }
                
                $user = new CUser;
                
                $id = $user->Add(
                    [
                        'LOGIN'            => $login,
                        'NAME'             => $name,
                        'LAST_NAME'        => $lastname,
                        'PASSWORD'         => $password,
                        'CONFIRM_PASSWORD' => $passwordConfirm,
                        'EMAIL'            => $email,
                        'GROUP_ID'         => $groups,
                        'ACTIVE'           => 'Y',
                        'LID'              => self::$site,
                        'PERSONAL_PHONE'   => isset($data['PHONE']) ? NormalizePhone($data['PHONE']) : '',
                        //'PERSONAL_ZIP'     => isset($this->data['ZIP']) ? $this->data['ZIP'] : '',
                        //'PERSONAL_STREET'  => isset($this->data['ADDRESS']) ? $this->data['ADDRESS'] : '',
                    ]
                );
                
            }
            
            if ($id <= 0) {
                
                $APPLICATION->ThrowException(
                    'Ошибка регистрации пользователя: ' .
                    ((strlen($user->LAST_ERROR) > 0) ? ': ' . $user->LAST_ERROR : ''), 'GENERATE_USER_ERROR');
                
            }
            
            return $id;
            
        }
        
        private static function getCart()
        {
            
            return Basket::loadItemsForFUser(
                self::$FuserID,
                self::$site
            );
            
        }
        
        private static function createShipment()
        {
            
            $shipmentCollection = self::$order->getShipmentCollection();
            
            $shipment = $shipmentCollection->createItem();
            
            $deliveryService = Delivery::getById(self::$data['DELIVERY']);
            
            if (!$deliveryService) {
                
                $deliveryService = Delivery::getById(EmptyDeliveryService::getEmptyDeliveryServiceId());
                
            }
            
            $shipment->setFields(
                [
                    'DELIVERY_ID'   => $deliveryService['ID'],
                    'DELIVERY_NAME' => $deliveryService['NAME'],
                ]
            );
            
            $shipmentItemCollection = $shipment->getShipmentItemCollection();
            
            foreach (self::$cart as $item) {
                
                $shipmentItem = $shipmentItemCollection->createItem($item);
                $shipmentItem->setQuantity($item->getQuantity());
                
            }
            
        }
        
        private static function createPayment()
        {
            
            $paymentCollection = self::$order->getPaymentCollection();
            
            $payment = $paymentCollection->createItem();
            
            $paySystemService = PaySystem::getObjectById(self::$data['PAYSYSTEM']);
            
            if ($paySystemService) {
                
                $payment->setFields(
                    [
                        'PAY_SYSTEM_ID'   => $paySystemService->getField("PAY_SYSTEM_ID"),
                        'PAY_SYSTEM_NAME' => $paySystemService->getField("NAME"),
                    ]
                );
                
            }
            
        }
        
        private static function setOrderProperties()
        {
            
            $orderProperties = self::$order->getPropertyCollection();
            
            foreach ($orderProperties as $property) {
                
                $property->setValue(self::$data[$property->getField('CODE')]);
                
            }
            
        }
        
    }
