<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Iblock\SectionTable;

/** @var array $arParams */
/** @var array $arResult */
/** @global \CMain $APPLICATION */
/** @global \CUser $USER */
/** @global \CDatabase $DB */
/** @var CBitrixComponentTemplate $this */

// region разделы

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
