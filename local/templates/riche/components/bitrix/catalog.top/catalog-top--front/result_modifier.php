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

$product_id = array_column($arResult['ITEMS'], 'ID');

if (!empty($product_id)) {

    $rReviews = ElementReviewsTable::getList(
        [
            'select'        => [
                'REVIEW_ID'     => 'ID',
                'REVIEW_SKU'    => 'SKU.VALUE',
                'REVIEW_RATING' => 'RATING.VALUE'
            ],
            'filter'        => [
                'IBLOCK_ID' => IblockTools::find('CUSTOMER', 'REVIEWS')->id(),
                'ID'        => array_column($arResult['ITEMS'], 'ID'),
                'ACTIVE'    => 'Y'
            ],
            'data_doubling' => false,
            'cache'         => [
                'ttl'         => $arParams['CACHE_TIME'],
                'cache_joins' => true
            ]
        ]
    );

}
