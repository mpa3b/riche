<?

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

use Bex\Tools\Iblock\IblockTools;

/** @global CMain $APPLICATION */
$APPLICATION->SetTitle('Главная');

?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'banners--front',
    [
        "IBLOCK_TYPE" => IblockTools::find('CONTENT', 'BANNERS')->type(),
        "IBLOCK_ID"   => IblockTools::find('CONTENT', 'BANNERS')->id(),
        "NEWS_COUNT"  => 5,

        "SORT_BY1"    => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "SORT_BY2"    => "SORT",
        "SORT_ORDER2" => "ASC",

        "FILTER_NAME"   => "",
        "FIELD_CODE"    => ["ID", "DETAIL_PICTURE", "PREVIEW_TEXT", "NAME"],
        "PROPERTY_CODE" => ["VIDEO", "LINK", "BUTTON_TEXT"],
        "CHECK_DATES"   => "Y",

        "SET_TITLE"            => "N",
        "SET_BROWSER_TITLE"    => "N",
        "SET_META_KEYWORDS"    => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_LAST_MODIFIED"    => "N",

        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",

        "ADD_SECTIONS_CHAIN" => "N",

        "CACHE_TYPE"   => "A",
        "CACHE_TIME"   => CACHE_TTL,
        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "Y",

        "AJAX_MODE"              => "N",
        "AJAX_OPTION_JUMP"       => "N",
        "AJAX_OPTION_STYLE"      => "N",
        "AJAX_OPTION_HISTORY"    => "N",
        "AJAX_OPTION_ADDITIONAL" => "",

        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO"
    ]
); ?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'features--front',
    [
        "IBLOCK_TYPE" => IblockTools::find('COMPANY', 'FEATURES')->type(),
        "IBLOCK_ID"   => IblockTools::find('COMPANY', 'FEATURES')->id(),
        "NEWS_COUNT"  => 0,

        "SORT_BY1"    => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "SORT_BY2"    => "SORT",
        "SORT_ORDER2" => "ASC",

        "FILTER_NAME"   => "",
        "FIELD_CODE"    => ["ID", "DETAIL_PICTURE", "PREVIEW_TEXT", "NAME", "DETAIL_PAGE_URL"],
        "PROPERTY_CODE" => ["VIDEO"],
        "CHECK_DATES"   => "Y",

        "SET_TITLE"            => "N",
        "SET_BROWSER_TITLE"    => "N",
        "SET_META_KEYWORDS"    => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_LAST_MODIFIED"    => "N",

        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",

        "ADD_SECTIONS_CHAIN" => "N",

        "CACHE_TYPE"   => "A",
        "CACHE_TIME"   => CACHE_TTL,
        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "Y",

        "AJAX_MODE"              => "N",
        "AJAX_OPTION_JUMP"       => "N",
        "AJAX_OPTION_STYLE"      => "N",
        "AJAX_OPTION_HISTORY"    => "N",
        "AJAX_OPTION_ADDITIONAL" => "",

        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO"
    ]
); ?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'slider--front',
    [
        "IBLOCK_TYPE" => IblockTools::find('COMPANY', 'SLIDES')->type(),
        "IBLOCK_ID"   => IblockTools::find('COMPANY', 'SLIDES')->id(),
        "NEWS_COUNT"  => 3,

        "SORT_BY1"    => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "SORT_BY2"    => "SORT",
        "SORT_ORDER2" => "ASC",

        "FILTER_NAME"   => "",
        "FIELD_CODE"    => ["ID", "DETAIL_PICTURE", "PREVIEW_TEXT", "DETAIL_TEXT", "NAME", "DETAIL_PAGE_URL"],
        "PROPERTY_CODE" => ["VIDEO", "BUTTON_TEXT", "BUTTON_LINK"],
        "CHECK_DATES"   => "Y",

        "SET_TITLE"            => "N",
        "SET_BROWSER_TITLE"    => "N",
        "SET_META_KEYWORDS"    => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_LAST_MODIFIED"    => "N",

        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",

        "ADD_SECTIONS_CHAIN" => "N",

        "CACHE_TYPE"   => "A",
        "CACHE_TIME"   => CACHE_TTL,
        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "Y",

        "AJAX_MODE"              => "N",
        "AJAX_OPTION_JUMP"       => "N",
        "AJAX_OPTION_STYLE"      => "N",
        "AJAX_OPTION_HISTORY"    => "N",
        "AJAX_OPTION_ADDITIONAL" => "",

        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO"
    ]
); ?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'problems--front',
    [
        "IBLOCK_TYPE" => IblockTools::find('CUSTOMER', 'PROBLEMS')->type(),
        "IBLOCK_ID"   => IblockTools::find('CUSTOMER', 'PROBLEMS')->id(),
        "NEWS_COUNT"  => 6,

        "SORT_BY1"    => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "SORT_BY2"    => "SORT",
        "SORT_ORDER2" => "ASC",

        "FILTER_NAME"   => "",
        "FIELD_CODE"    => ["ID", "DETAIL_PICTURE", "PREVIEW_TEXT", "DETAIL_TEXT", "NAME", "DETAIL_PAGE_URL"],
        "PROPERTY_CODE" => ["VIDEO"],
        "CHECK_DATES"   => "Y",

        "SET_TITLE"            => "N",
        "SET_BROWSER_TITLE"    => "N",
        "SET_META_KEYWORDS"    => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_LAST_MODIFIED"    => "N",

        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",

        "ADD_SECTIONS_CHAIN" => "N",

        "CACHE_TYPE"   => "A",
        "CACHE_TIME"   => CACHE_TTL,
        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "Y",

        "AJAX_MODE"              => "N",
        "AJAX_OPTION_JUMP"       => "N",
        "AJAX_OPTION_STYLE"      => "N",
        "AJAX_OPTION_HISTORY"    => "N",
        "AJAX_OPTION_ADDITIONAL" => "",

        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO"
    ]
); ?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'articles--front',
    [
        "IBLOCK_TYPE" => IblockTools::find('CONTENT', 'ARTICLES')->type(),
        "IBLOCK_ID"   => IblockTools::find('CONTENT', 'ARTICLES')->id(),
        "NEWS_COUNT"  => 6,
        "SORT_ORDER2" => "ASC",

        "SORT_BY1"    => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "SORT_BY2"    => "SORT",

        "CHECK_DATES" => "Y",

        "FILTER_NAME"   => "",
        "FIELD_CODE"    => ["ID", "DETAIL_PICTURE", "PREVIEW_TEXT", "DETAIL_TEXT", "NAME", "DETAIL_PAGE_URL"],
        "PROPERTY_CODE" => ["VIDEO"],

        "ACTIVE_DATE_FORMAT" => "j F",

        "SET_TITLE"            => "N",
        "SET_BROWSER_TITLE"    => "N",
        "SET_META_KEYWORDS"    => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_LAST_MODIFIED"    => "N",

        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",

        "ADD_SECTIONS_CHAIN" => "N",

        "CACHE_TYPE"   => "A",
        "CACHE_TIME"   => CACHE_TTL,
        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "Y",

        "AJAX_MODE"              => "N",
        "AJAX_OPTION_JUMP"       => "N",
        "AJAX_OPTION_STYLE"      => "N",
        "AJAX_OPTION_HISTORY"    => "N",
        "AJAX_OPTION_ADDITIONAL" => "",

        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO"
    ]
); ?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'reviews--front',
    [
        "IBLOCK_TYPE" => IblockTools::find('CUSTOMER', 'REVIEWS')->type(),
        "IBLOCK_ID"   => IblockTools::find('CUSTOMER', 'REVIEWS')->id(),
        "NEWS_COUNT"  => 8,
        "SORT_ORDER2" => "ASC",

        "SORT_BY1"    => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "SORT_BY2"    => "SORT",

        "CHECK_DATES" => "Y",

        "FILTER_NAME"   => "",
        "FIELD_CODE"    => ["ID", "DETAIL_TEXT"],
        "PROPERTY_CODE" => ["RATING", "AUTHOR_NAME", "AUTHOR_PICTURE", "SKU"],

        "ACTIVE_DATE_FORMAT" => "j F",

        "SET_TITLE"            => "N",
        "SET_BROWSER_TITLE"    => "N",
        "SET_META_KEYWORDS"    => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_LAST_MODIFIED"    => "N",

        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",

        "ADD_SECTIONS_CHAIN" => "N",

        "CACHE_TYPE"   => "A",
        "CACHE_TIME"   => CACHE_TTL,
        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "Y",

        "AJAX_MODE"              => "N",
        "AJAX_OPTION_JUMP"       => "N",
        "AJAX_OPTION_STYLE"      => "N",
        "AJAX_OPTION_HISTORY"    => "N",
        "AJAX_OPTION_ADDITIONAL" => "",

        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO"
    ]
); ?>



<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'cta--front',
    [
        "IBLOCK_TYPE" => IblockTools::find('CONTENT', 'CTA')->type(),
        "IBLOCK_ID"   => IblockTools::find('CONTENT', 'CTA')->id(),
        "NEWS_COUNT"  => 3,
        "SORT_ORDER2" => "ASC",

        "SORT_BY1"    => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "SORT_BY2"    => "SORT",

        "CHECK_DATES" => "Y",

        "FILTER_NAME"   => "",
        "FIELD_CODE"    => ["ID", "DETAIL_TEXT"],
        "PROPERTY_CODE" => ["RATING", "AUTHOR_NAME", "AUTHOR_PICTURE", "SKU"],

        "ACTIVE_DATE_FORMAT" => "j F",

        "SET_TITLE"            => "N",
        "SET_BROWSER_TITLE"    => "N",
        "SET_META_KEYWORDS"    => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_LAST_MODIFIED"    => "N",

        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",

        "ADD_SECTIONS_CHAIN" => "N",

        "CACHE_TYPE"   => "A",
        "CACHE_TIME"   => CACHE_TTL,
        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "Y",

        "AJAX_MODE"              => "N",
        "AJAX_OPTION_JUMP"       => "N",
        "AJAX_OPTION_STYLE"      => "N",
        "AJAX_OPTION_HISTORY"    => "N",
        "AJAX_OPTION_ADDITIONAL" => "",

        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO"
    ]
); ?>

<? $APPLICATION->IncludeComponent(
    "bitrix:sender.subscribe",
    "subcribe--front",
    [
        "USE_PERSONALIZATION" => "Y",
        "CONFIRMATION"        => "Y",
        "SHOW_HIDDEN"         => "N",
        "HIDE_MAILINGS"       => "N",

        "CACHE_TYPE" => "A",
        "CACHE_TIME" => CACHE_TTL,

        "AJAX_MODE"           => "Y",
        "AJAX_OPTION_JUMP"    => "Y",
        "AJAX_OPTION_STYLE"   => "Y",
        "AJAX_OPTION_HISTORY" => "Y",

        "SET_TITLE" => "N",

        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO"
    ]
); ?>

<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>
