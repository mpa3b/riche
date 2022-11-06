<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

/** @global CMain $APPLICATION */
$APPLICATION->SetTitle('Главная');

?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'banners--front',
    [
        "IBLOCK_TYPE" => "CONTENT",
        "IBLOCK_ID" => 1,
        "NEWS_COUNT" => 3,

        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",

        "FILTER_NAME" => "",
        "FIELD_CODE" => ["ID"],
        "PROPERTY_CODE" => ["IMAGE", "VIDEO", "LINK", "BUTTON_TEXT"],
        "CHECK_DATES" => "Y",

        "SET_TITLE" => "N",
        "SET_BROWSER_TITLE" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_LAST_MODIFIED" => "N",

        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",

        "ADD_SECTIONS_CHAIN" => "N",

        "CACHE_TYPE" => "A",
        "CACHE_TIME" => CACHE_TTL,
        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "Y",

        "AJAX_MODE" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "N",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_ADDITIONAL" => ""
    ]
); ?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'features--front',
    [
        "IBLOCK_TYPE" => "CONTENT",
        "IBLOCK_ID" => 2,
        "NEWS_COUNT" => 0,

        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",

        "FILTER_NAME" => "",
        "FIELD_CODE" => ["ID"],
        "PROPERTY_CODE" => ["IMAGE", "VIDEO", "LINK", "BUTTON_TEXT"],
        "CHECK_DATES" => "Y",

        "SET_TITLE" => "N",
        "SET_BROWSER_TITLE" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_LAST_MODIFIED" => "N",

        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",

        "ADD_SECTIONS_CHAIN" => "N",

        "CACHE_TYPE" => "A",
        "CACHE_TIME" => CACHE_TTL,
        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "Y",

        "AJAX_MODE" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "N",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_ADDITIONAL" => ""
    ]
); ?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'about--front',
    [
        "IBLOCK_TYPE" => "CONTENT",
        "IBLOCK_ID" => 3,
        "NEWS_COUNT" => 0,

        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",

        "FILTER_NAME" => "",
        "FIELD_CODE" => ["ID"],
        "PROPERTY_CODE" => ["IMAGE", "VIDEO", "LINK", "BUTTON_TEXT"],
        "CHECK_DATES" => "Y",

        "SET_TITLE" => "N",
        "SET_BROWSER_TITLE" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_LAST_MODIFIED" => "N",

        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",

        "ADD_SECTIONS_CHAIN" => "N",

        "CACHE_TYPE" => "A",
        "CACHE_TIME" => CACHE_TTL,
        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "Y",

        "AJAX_MODE" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "N",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_ADDITIONAL" => ""
    ]
); ?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'problems--front',
    []
); ?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'articles--front',
    []
); ?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:form',
    'quiz--front',
    []
); ?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:catalog.top',
    'catalog--front',
    []
); ?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'reviews--front',
    []
); ?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'offer--front',
    []
); ?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:subscribe.form',
    'subscribe--front',
    []
); ?>

<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
?>
