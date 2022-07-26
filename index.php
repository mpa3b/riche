<?php

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

global $APPLICATION, $USER;

use Riche\Template;

$APPLICATION->SetTitle("Про красоту и здоровье");

$APPLICATION->SetPageProperty("keywords", "RICHE, здоровье, красота, уход");
$APPLICATION->SetPageProperty("description", "RICHE — это про красоту и здоровье");

?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'banners--front--static',
    [
        'IBLOCK_TYPE'               => 'CONTENT',
        'IBLOCK_ID'                 => 1,
        'NEWS_COUNT'                => 3,
        'SORT_BY1'                  => 'ACTIVE_FROM',
        'SORT_ORDER1'               => 'DESC ',
        'CHECK_DATES'               => 'Y',
        'SET_TITLE'                 => 'N',
        'SET_BROWSER_TITLE'         => 'N',
        'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
        'ADD_SECTIONS_CHAIN'        => 'N',

        'PROPERTY_CODE' => [
            'HERO_IMAGE', 'BACKGROUND_IMAGE'
        ],

        'CACHE_TYPE' => 'A',
        'CACHE_TIME' => Template::CACHE_TIME,

        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO"
    ]
); ?>
<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'brand--front--slider',
    [
        'IBLOCK_TYPE'               => 'CONTENT',
        'IBLOCK_ID'                 => 6,
        'NEWS_COUNT'                => 6,
        'SORT_BY1'                  => 'ACTIVE_FROM',
        'SORT_ORDER1'               => 'DESC ',
        'CHECK_DATES'               => 'Y',
        'SET_TITLE'                 => 'N',
        'SET_BROWSER_TITLE'         => 'N',
        'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
        'ADD_SECTIONS_CHAIN'        => 'N',

        'FIELD_CODE' => [
            'DETAIL_PICTURE',
            'PREVIEW_PICTURE'
        ],

        'DISPLAY_PICTURE' => 'Y',

        'CACHE_TYPE' => 'A',
        'CACHE_TIME' => Template::CACHE_TIME,

        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO"
    ]
); ?>
<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'features--front--slider',
    [
        'IBLOCK_TYPE'               => 'CONTENT',
        'IBLOCK_ID'                 => 4,
        'NEWS_COUNT'                => 6,
        'SORT_BY1'                  => 'ACTIVE_FROM',
        'SORT_ORDER1'               => 'DESC ',
        'CHECK_DATES'               => 'Y',
        'SET_TITLE'                 => 'N',
        'SET_BROWSER_TITLE'         => 'N',
        'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
        'ADD_SECTIONS_CHAIN'        => 'N',

        'FIELD_CODE' => [
            'DETAIL_PICTURE',
            'PREVIEW_PICTURE'
        ],

        'DISPLAY_PICTURE' => 'Y',

        'CACHE_TYPE' => 'A',
        'CACHE_TIME' => Template::CACHE_TIME,

        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO"
    ]
); ?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'reviews--front',
    [
        'IBLOCK_TYPE' => 'CONTENT',
        'IBLOCK_ID'   => 3,
        'NEWS_COUNT'  => 9,
        'SORT_BY1'    => 'ACTIVE_FROM',
        'SORT_ORDER1' => 'DESC ',
        'CHECK_DATES' => 'Y',

        'ACTIVE_DATE_FORMAT' => 'j F',

        'RATING_MAX' => 5,
        'TEXT_LIMIT' => 300,

        'PROPERTY_CODE' => [
            'AUTHOR_IMAGE', 'AUTHOR_TITLE', 'AUTHOR_NAME', 'AUTHOR_NAME', 'DATE', 'SKU', 'RATING', 'SKU'
        ],

        'SET_TITLE'                 => 'N',
        'SET_BROWSER_TITLE'         => 'N',
        'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
        'ADD_SECTIONS_CHAIN'        => 'N',

        'CACHE_TYPE' => 'A',
        'CACHE_TIME' => Template::CACHE_TIME,

        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO"
    ]
); ?>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>

