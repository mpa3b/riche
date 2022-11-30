<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/** @var array $arParams */
/** @var array $arResult */
/** @global \CMain $APPLICATION */
/** @global \CUser $USER */
/** @global \CDatabase $DB */

/** @var CBitrixComponentTemplate $this */

use Bex\Tools\Iblock\IblockTools;
use Bitrix\Iblock\Elements\ElementReviewsTable;
use Bitrix\Iblock\ElementTable;

$rReviews = ElementReviewsTable::getList(
    [
        'select'        => [
            'ID',
            'REVIEW_SKU'    => 'SKU.VALUE',
            'REVIEW_RATING' => 'RATING.VALUE'
        ],
        'filter'        => [
            'IBLOCK_ID'  => IblockTools::find('CUSTOMER', 'REVIEWS')->id(),
            'REVIEW_SKU' => $arResult['ID'],
            'ACTIVE'     => 'Y'
        ],
        'data_doubling' => false,
        'cache'         => [
            'ttl' => $arParams['CACHE_TIME']
        ]
    ]
);

$reviews = $rReviews->fetchAll();

$count  = count($reviews);
$values = array_column($reviews, 'REVIEW_RATING');
$median = round(array_sum($values) / count($reviews), 2);
$max    = (int) max($values);

$arResult['REVIEWS'] = [
    'COUNT'  => $count,
    'MEDIAN' => $median,
    'MAX'    => $max
];

if ($arResult['DISPLAY_PROPERTIES']['INGREDIENTS']) {

    $rIngredientsItems = ElementTable::getList(
        [
            'select' => [
                'ID',
                'NAME'
            ],
            'filter' => [
                'IBLOCK_ID' => IblockTools::find('CONTENT', 'INGREDIENTS')->id(),
                'ID'        => $arResult['DISPLAY_PROPERTIES']['INGREDIENTS']['DESCRIPTION']
            ],
            'cache'  => [
                'ttl' => $arParams['CACHE_TIME']
            ]
        ]
    );

    while ($ingredientItem = $rIngredientsItems->fetch()) {

        $ingredientsItems[$ingredientItem['ID']] = $ingredientItem['NAME'];

    }

    foreach ($arResult['DISPLAY_PROPERTIES']['INGREDIENTS']['DESCRIPTION'] as &$element) {

        $element = $ingredientsItems[$element];

    }

}

if ($arResult['DISPLAY_PROPERTIES']['KEY_INGREDIENTS']) {

    $rKeyIngredientsItems = ElementTable::getList(
        [
            'select' => [
                'ID',
                'NAME',
                'PREVIEW_TEXT'
            ],
            'filter' => [
                'IBLOCK_ID' => IblockTools::find('CONTENT', 'KEY_INGREDIENTS')->id(),
                'ID'        => $arResult['DISPLAY_PROPERTIES']['KEY_INGREDIENTS']['VALUE']
            ],
            'cache'  => [
                'ttl' => $arParams['CACHE_TIME']
            ]
        ]
    );

    $arResult['DISPLAY_PROPERTIES']['KEY_INGREDIENTS']['VALUE'] = $rKeyIngredientsItems->fetchAll();

}
