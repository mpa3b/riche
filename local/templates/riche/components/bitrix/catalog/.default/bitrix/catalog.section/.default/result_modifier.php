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

// region отзывы

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
