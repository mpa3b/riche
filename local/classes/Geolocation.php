<?php

    namespace Local;

    use Bitrix\Main\Entity\ReferenceField;
    use Bitrix\Main\Service\GeoIp\Manager;
    use Bitrix\Sale\Location\GeoIp;
    use Bitrix\Sale\Location\LocationTable;
    use Bitrix\Sale\Location\TypeTable;

    /**
     * Класс для реализации геолокации по айпи-адресу
     *
     * @todo дополнить работой с сессией или куками
     * @todo дополнить заполнением айпи-адресов в свойства местоположения Битрикс (возможно)
     * @todo надо подумать насчёт связать с данными из дадата
     */
    class Geolocation
    {

        public static function detectCity()
        {

            $city = false;

            if ($ip = Manager::getRealIp() && !$city)
            {

                $id = GeoIp::getLocationId($ip, LANGUAGE_ID);

                $location = LocationTable::getList(
                    [
                        'select' => [
                            'LOCATION' => 'NAME.NAME'
                        ],
                        'filter' => [
                            'ID'                => $id,
                            '=NAME.LANGUAGE_ID' => LANGUAGE_ID,
                        ]
                    ]
                )->fetch();

                $city = $location['LOCATION'];

            }

            return $city;

        }

        public static function getCityNameById(int $id)
        {

            $city = LocationTable::getList(
                [
                    'select' => [
                        'ID', 'NAME.NAME'
                    ],
                    'filter' => [
                        'ID'                => $id,
                        '=NAME.LANGUAGE_ID' => LANGUAGE_ID,
                    ]
                ]
            )->fetch();

            return (string) $city['SALE_LOCATION_LOCATION_NAME_NAME'];

        }

        public static function searchCityByName(string $search)
        {

            $locations = LocationTable::getList(
                [
                    'select'  => [
                        'ID',
                        'TITLE' => 'NAME.NAME',
                    ],
                    'filter'  => [
                        '=LOC_TYPES.CODE'   => 'CITY',
                        '=NAME.LANGUAGE_ID' => LANGUAGE_ID,
                        '?TITLE'            => $search
                    ],
                    'runtime' => [
                        new ReferenceField(
                            'LOC_TYPES',
                            TypeTable::class,
                            ['=this.TYPE_ID' => 'ref.ID'],
                            ['join_type' => 'LEFT']
                        )
                    ]
                ]
            );

            $items = [];

            while ($city = $locations->fetch()) {

                $items[] = [
                    'id'   => $city['ID'],
                    'name' => $city['TITLE'],
                ];

            }

            return $items;

        }


    }
