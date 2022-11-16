<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bex\Tools\Iblock\IblockTools;
use Bitrix\Iblock\ElementTable;

/** @var array $arParams */
/** @var array $arResult */
/** @global \CMain $APPLICATION */
/** @global \CUser $USER */
/** @global \CDatabase $DB */
/** @var CBitrixComponentTemplate $this */

// @todo тут нужна группировка по ID, чтобы было ID => RATING

$rReviews = ElementTable::getList(
    [
        // 'order' => [],
        'filter'        => [
            'IBLOCK_ID' => IblockTools::find('CUSTOMER', 'REVIEWS')->id(),
            'ID'        => array_column($arResult['ITEMS'], 'ID'),
            'ACTIVE'    => 'Y'
        ],
        'select'        => [
            'ID',
            'SKU',
            'RATING'
        ],
        'group'         => 'SKU',
        // 'limit' => 1000,
        // 'offset' => 0, // целое число, указывающее номер первого столбца в результате
        // 'count_total' => 1,
        // 'runtime' => [], // массив полей сущности, создающихся динамически
        'data_doubling' => false,
        'cache'         => [
            'ttl'         => $arParams['CACHE_TIME'],
            'cache_joins' => true // Кешировать ли выборки с JOIN
        ]
    ]
);
