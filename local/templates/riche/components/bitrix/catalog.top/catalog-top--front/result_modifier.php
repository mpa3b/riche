<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bex\Tools\Iblock\IblockTools;
use Bitrix\Iblock\Elements\ElementReviewsTable;

/** @var array $arParams */
/** @var array $arResult */
/** @global \CMain $APPLICATION */
/** @global \CUser $USER */
/** @global \CDatabase $DB */
/** @var CBitrixComponentTemplate $this */

// @todo тут нужно суммировать и усреднять значение рейтинга

$products = array_column($arResult['ITEMS'], 'ID');

d($products);

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
                'ttl'         => $arParams['CACHE_TIME'],
                'cache_joins' => true
            ]
        ]
    );

    $arReviews = [];

    while ($review = $rReviews->fetch()) {

        $arReviews[$review['REVIEW_SKU']] = $review['REVIEW_RATING'];

    }

    d($arReviews);

    foreach ($arResult['ITEMS'] as &$arItem) {

        $arItem['REVIEWS'] = $arReviews[$arItem['ID']];

    }

}
