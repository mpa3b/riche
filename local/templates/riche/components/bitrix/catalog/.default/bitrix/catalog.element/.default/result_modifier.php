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

//use Bex\Tools\Iblock\IblockTools;
//use Bitrix\Iblock\Elements\ElementReviewsTable;
//
//$rReviews = ElementReviewsTable::getList(
//    [
//        'select'        => [
//            'ID',
//            'CREATED_BY',
//            'ACTIVE_FROM',
//            'NAME',
//            'DETAIL_TEXT',
//            'REVIEW_SKU'    => 'SKU.VALUE',
//            'REVIEW_RATING' => 'RATING.VALUE'
//        ],
//        'filter'        => [
//            'IBLOCK_ID'  => IblockTools::find('CUSTOMER', 'REVIEWS')->id(),
//            'REVIEW_SKU' => $arResult['ID'],
//            'ACTIVE'     => 'Y'
//        ],
//        'data_doubling' => false,
//        'cache'         => [
//            'ttl' => $arParams['CACHE_TIME']
//        ]
//    ]
//);
