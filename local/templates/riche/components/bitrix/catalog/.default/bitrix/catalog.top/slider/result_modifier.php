<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bex\Tools\Iblock\IblockTools;
use Bitrix\Iblock\Elements\ElementReviewsTable;
use Bitrix\Iblock\SectionTable;

/** @var array $arParams */
/** @var array $arResult */
/** @global \CMain $APPLICATION */
/** @global \CUser $USER */
/** @global \CDatabase $DB */
/** @var CBitrixComponentTemplate $this */

// region рейтинг

$products = array_column($arResult['ITEMS'], 'ID');

if (!empty($products)) {

    $rReviews = ElementReviewsTable::getList(
        [
            'select'        => [
                'REVIEW_SKU'    => 'SKU.VALUE',
                'REVIEW_RATING' => 'RATING.VALUE'
            ],
            'filter'        => [
                'IBLOCK_ID'  => IblockTools::find('CUSTOMER', 'REVIEWS')->id(),
                'REVIEW_SKU' => $products,
                'ACTIVE'     => 'Y'
            ],
            'data_doubling' => false,
            'cache'         => [
                'ttl' => $arParams['CACHE_TIME']
            ]
        ]
    );

    $arReviews = [];

    while ($review = $rReviews->fetch()) {

        $arReviews[$review['REVIEW_SKU']][] = $review['REVIEW_RATING'];

    }

    foreach ($arResult['ITEMS'] as &$arItem) {

        if ($arReviews[$arItem['ID']]) {

            $count  = count($arReviews[$arItem['ID']]);
            $sum    = array_sum($arReviews[$arItem['ID']]);
            $median = round($sum / $count, 2);

            $arItem['REVIEWS'] = [
                'MEDIAN' => $median,
                'COUNT'  => $count
            ];

        }

    }

}

// endregion

// region рейтинг

$rSections = SectionTable::getList(
    [
        'filter' => [
            'IBLOCK_ID' => $arParams['IBLOCK_ID'],
            'ID'        => array_column($arResult['ITEMS'], 'IBLOCK_SECTION_ID')
        ],
        'select' => [
            'ID',
            'NAME'
        ],
        'cache'  => [
            'ttl' => $arParams['CACHE_TIME']
        ]
    ]
);


while ($arSection = $rSections->fetch()) {

    $arResult['SECTIONS'][$arSection['ID']] = [
        'ID'   => $arSection['ID'],
        'NAME' => $arSection['NAME'],
    ];

}

foreach ($arResult['ITEMS'] as &$arItem) {

    $arItem['SECTION_NAME'] = $arResult['SECTIONS'][$arItem['IBLOCK_SECTION_ID']]['NAME'];

}

// endregion
