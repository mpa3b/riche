<?php
    
    if (!defined("B_PROLOG_INCLUDED") or B_PROLOG_INCLUDED !== true) {
        die();
    }
    
    //    use Riche\Template;
    //    use Bitrix\Catalog\MeasureTable;
    //    use Bitrix\Catalog\PriceTable;
    //    use Bitrix\Catalog\ProductTable;
    //
    //    use Bitrix\Iblock\Elements\ElementCatalogTable;
    //    use Bitrix\Iblock\Elements\ElementOffersTable;
    //    use Bitrix\Iblock\ElementTable;
    //    use Bitrix\Iblock\IblockTable;
    //
    //    /** @var array $arParams */
    //    /** @var array $arResult */
    //    /** @global \CMain $APPLICATION */
    //    /** @global \CUser $USER */
    //    /** @global \CDatabase $DB */
    //    /** @var CBitrixComponentTemplate $this */
    //
    //    if (!empty($arResult["SEARCH"])) {
    //
    //        $rItems = ElementTable::getList(
    //            [
    //                'select'  => [
    //                    'ID',
    //                    'IBLOCK_ID',
    //                    'PREVIEW_PICTURE',
    //                    //'MEASURE',
    //                    'PRICE'    => 'PRICE_VALUE.PRICE',
    //                    'CURRENCY' => 'PRICE_VALUE.CURRENCY'
    //                ],
    //                'filter'  => [
    //                    'ID'     => array_unique(array_column($arResult["SEARCH"], 'ID')),
    //                    'ACTIVE' => 'Y'
    //                ],
    //                'runtime' => [
    //                    'PRICE_VALUE' => [
    //                        'data_type' => PriceTable::class,
    //                        'reference' => ['=this.ID' => 'ref.PRODUCT_ID'],
    //                        'join_type' => 'left'
    //                    ],
    //                ],
    //                //'runtime' => [
    //                //    'MEASURE' => [
    //                //        'data_type' => MeasureTable::class,
    //                //        'reference' => ['=this.ID' => 'ref.ID'],
    //                //        'join_type' => 'left'
    //                //    ],
    //                //]
    //            ]
    //        );
    //
    //        $items = $rItems->fetchAll();
    //
    //        // d($items);
    //
    //        $rIblock = IblockTable::getList(
    //            [
    //                'select' => ['ID', 'NAME'],
    //                'filter' => array_unique(array_column($items, 'IBLOCK_ID')),
    //                'cache'  => [
    //                    'ttl' => $arParams['CACHE_TIME']
    //                ]
    //            ]
    //        );
    //
    //        $arResult['IBLOCK'] = $rIblock->fetchAll();
    //
    //        if (!empty($items)) {
    //
    //            $rProducts = ProductTable::getList(
    //                [
    //                    'select' => ['ID', 'MEASURE'],
    //                    'filter' => ['=ID' => array_column($items, 'ID')]
    //                ]
    //            );
    //
    //            $products = $rProducts->fetchAll();
    //
    //            foreach ($items as &$item) {
    //
    //                foreach ($products as $product) {
    //
    //                    if ($item['ID'] == $product['ID']) {
    //                        $item['MEASURE'] = $product['MEASURE'];
    //                    }
    //
    //                }
    //
    //            }
    //
    //            if (!empty($products)) {
    //
    //                $rMeasure = MeasureTable::getList(
    //                    [
    //                        'select' => ['ID', 'CODE'],
    //                        'filter' => [
    //                            'ID' => array_unique(array_column($products, 'MEASURE'))
    //                        ]
    //                    ]
    //                );
    //
    //                while ($measureUnit = $rMeasure->fetch()) {
    //
    //                    $measureUnits[$measureUnit['ID']]['ID']     = $measureUnit['ID'];
    //                    $measureUnits[$measureUnit['ID']]['CODE']   = $measureUnit['CODE'];
    //                    $measureUnits[$measureUnit['ID']]['SYMBOL'] =
    //                        CCatalogMeasureClassifier::getMeasureTitle($measureUnit["CODE"], 'SYMBOL_RUS');
    //                    $measureUnits[$measureUnit['ID']]['TITLE']  =
    //                        CCatalogMeasureClassifier::getMeasureTitle($measureUnit["CODE"], 'MEASURE_TITLE');
    //
    //                }
    //
    //            }
    //
    //        }
    //
    //        foreach ($arResult['SEARCH'] as &$arItem) {
    //
    //            foreach ($items as $item) {
    //
    //                if ($arItem["ID"] == $item['ID']) {
    //
    //                    if (!empty($item['PREVIEW_PICTURE'])) {
    //
    //                        $arItem['PREVIEW_PICTURE'] = $item['PREVIEW_PICTURE'];
    //
    //                    }
    //
    //                    if (!empty($item['PRICE'])) {
    //
    //                        $arItem['PRICE'] = [
    //                            'VALUE'    => $item['PRICE'],
    //                            'CURRENCY' => $item['CURRENCY']
    //                        ];
    //
    //                    }
    //
    //                    if (!empty($arItem['MEASURE'])) {
    //
    //                        $arItem['MEASURE'] = [
    //                            'ID'     => $item['MEASURE'],
    //                            'TITLE'  => $measureUnits[$arItem['MEASURE']]['TITLE'],
    //                            'SYMBOL' => $measureUnits[$arItem['MEASURE']]['SYMBOL'],
    //                            'CODE'   => $measureUnits[$arItem['MEASURE']]['CODE']
    //                        ];
    //
    //                    }
    //
    //                }
    //
    //            }
    //
    //        }
    //
    //    }
