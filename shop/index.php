<?

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

use Bex\Tools\Iblock\IblockTools;

/** @global CMain $APPLICATION */

$APPLICATION->SetTitle("Магазин");
$APPLICATION->SetPageProperty("tags", "каталог, товары");

?>

<? $APPLICATION->IncludeComponent(
    "bitrix:catalog",
    "",
    [
        "IBLOCK_TYPE" => IblockTools::find('CATALOG', 'PRODUCTS')->type(),
        "IBLOCK_ID"   => IblockTools::find('CATALOG', 'PRODUCTS')->id(),

        "ACTION_VARIABLE" => "action",

        "BIG_DATA_RCM_TYPE" => "personal",

        "ELEMENT_SORT_FIELD"  => "sort",
        "ELEMENT_SORT_FIELD2" => "id",
        "ELEMENT_SORT_ORDER"  => "asc",
        "ELEMENT_SORT_ORDER2" => "desc",

        "ADD_ELEMENT_CHAIN"        => "Y",
        "ADD_PICT_PROP"            => "-",
        "ADD_PROPERTIES_TO_BASKET" => "N",
        "ADD_SECTIONS_CHAIN"       => "Y",

        "AJAX_MODE"              => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY"    => "N",
        "AJAX_OPTION_JUMP"       => "N",
        "AJAX_OPTION_STYLE"      => "Y",

        "BASKET_URL" => ORDER_URL,

        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "N",
        "CACHE_TIME"   => CACHE_TTL,
        "CACHE_TYPE"   => "A",

        "COMMON_ADD_TO_BASKET_ACTION" => "ADD",
        "COMMON_SHOW_CLOSE_POPUP"     => "N",

        "COMPATIBLE_MODE"  => "N",
        "CONVERT_CURRENCY" => "Y",

        "CURRENCY_ID" => "RUB",

        "DETAIL_ADD_DETAIL_TO_SLIDER"         => "N",
        "DETAIL_ADD_TO_BASKET_ACTION"         => ["BUY"],
        "DETAIL_ADD_TO_BASKET_ACTION_PRIMARY" => ["BUY"],

        "DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
        "DETAIL_DISPLAY_NAME"              => "Y",
        "DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",

        "DETAIL_BROWSER_TITLE"    => "-",
        "DETAIL_META_DESCRIPTION" => "-",
        "DETAIL_META_KEYWORDS"    => "-",

        "DETAIL_OFFERS_FIELD_CODE" => [""],

        "DETAIL_SET_CANONICAL_URL"       => "Y",
        "DETAIL_SET_VIEWED_IN_COMPONENT" => "Y",

        "DETAIL_SHOW_POPULAR" => "Y",
        "DETAIL_SHOW_VIEWED"  => "Y",

        "DETAIL_STRICT_SECTION_CHECK" => "Y",

        "DISABLE_INIT_JS_IN_COMPONENT" => "Y",

        "DISPLAY_TOP_PAGER"    => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",

        "GIFTS_DETAIL_BLOCK_TITLE"        => "Выберите один из подарков",
        "GIFTS_DETAIL_HIDE_BLOCK_TITLE"   => "N",
        "GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => 3,
        "GIFTS_DETAIL_TEXT_LABEL_GIFT"    => "Подарок",

        "GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE"        => "Выберите один из товаров, чтобы получить подарок",
        "GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE"   => "N",
        "GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => 3,

        "GIFTS_MESS_BTN_BUY" => "Выбрать",

        "GIFTS_SECTION_LIST_BLOCK_TITLE"        => "Подарки к товарам этого раздела",
        "GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE"   => "N",
        "GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT" => 3,
        "GIFTS_SECTION_LIST_TEXT_LABEL_GIFT"    => "Подарок",

        "GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
        "GIFTS_SHOW_IMAGE"            => "Y",
        "GIFTS_SHOW_NAME"             => "Y",
        "GIFTS_SHOW_OLD_PRICE"        => "Y",

        "HIDE_NOT_AVAILABLE"        => "N",
        "HIDE_NOT_AVAILABLE_OFFERS" => "L",

        "INCLUDE_SUBSECTIONS" => "Y",
        "INSTANT_RELOAD"      => "N",

        "LINE_ELEMENT_COUNT" => 3,
        "LINK_ELEMENTS_URL"  => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
        "LINK_IBLOCK_ID"     => "",
        "LINK_IBLOCK_TYPE"   => "",
        "LINK_PROPERTY_SID"  => "",

        "LIST_BROWSER_TITLE" => "-",

        "LIST_META_DESCRIPTION"     => "-",
        "LIST_META_KEYWORDS"        => "-",
        "LIST_OFFERS_FIELD_CODE"    => [""],
        "LIST_OFFERS_LIMIT"         => 6,
        "LIST_PROPERTY_CODE_MOBILE" => [],
        "LIST_SLIDER_PROGRESS"      => "N",

        "MESSAGE_404" => "",

        "MESS_BTN_ADD_TO_BASKET"  => "В корзину",
        "MESS_BTN_BUY"            => "Купить",
        "MESS_BTN_COMPARE"        => "Сравнение",
        "MESS_BTN_DETAIL"         => "Подробнее",
        "MESS_BTN_LAZY_LOAD"      => "Показать ещё",
        "MESS_BTN_SUBSCRIBE"      => "Подписаться",
        "MESS_COMMENTS_TAB"       => "Комментарии",
        "MESS_DESCRIPTION_TAB"    => "Описание",
        "MESS_NOT_AVAILABLE"      => "Нет в наличии",
        "MESS_PRICE_RANGES_TITLE" => "Цены",
        "MESS_PROPERTIES_TAB"     => "Характеристики",

        "OFFERS_SORT_FIELD"  => "sort",
        "OFFERS_SORT_FIELD2" => "id",
        "OFFERS_SORT_ORDER"  => "asc",
        "OFFERS_SORT_ORDER2" => "desc",

        "PAGER_BASE_LINK_ENABLE"          => "N",
        "PAGER_DESC_NUMBERING"            => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => CACHE_TTL * 2,
        "PAGER_SHOW_ALL"                  => "N",
        "PAGER_SHOW_ALWAYS"               => "N",
        "PAGER_TEMPLATE"                  => ".default",
        "PAGER_TITLE"                     => "Наши товары",

        "PAGE_ELEMENT_COUNT" => 12,

        "PARTIAL_PRODUCT_PROPERTIES" => "N",
        "PRICE_CODE"                 => ["BASE"],
        "PRICE_VAT_INCLUDE"          => "Y",
        "PRICE_VAT_SHOW_VALUE"       => "N",

        "PRODUCT_DISPLAY_MODE"      => "N",
        "PRODUCT_ID_VARIABLE"       => "id",
        "PRODUCT_PROPS_VARIABLE"    => "prop",
        "PRODUCT_QUANTITY_VARIABLE" => "quantity",
        "PRODUCT_SUBSCRIPTION"      => "N",

        "SEARCH_CHECK_DATES"             => "Y",
        "SEARCH_NO_WORD_LOGIC"           => "N",
        "SEARCH_PAGE_RESULT_COUNT"       => 12,
        "SEARCH_RESTART"                 => "N",
        "SEARCH_USE_LANGUAGE_GUESS"      => "Y",
        "SEARCH_USE_SEARCH_RESULT_ORDER" => "N",

        "SECTIONS_SHOW_PARENT_NAME" => "Y",

        "SECTION_ADD_TO_BASKET_ACTION"     => "ADD",
        "SECTION_COUNT_ELEMENTS"           => "Y",
        "SECTION_ID_VARIABLE"              => "SECTION_ID",
        "SECTION_TOP_DEPTH"                => 2,

        "SEF_FOLDER"                       => SHOP_ROOT_URL,
        "SEF_MODE"                         => "Y",
        "SEF_URL_TEMPLATES"                => [
            "compare"      => "",
            "element"      => "/#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
            "section"      => "/#SECTION_CODE_PATH#/",
            "sections"     => "/",
            "smart_filter" => ""
        ],

        "SET_LAST_MODIFIED"                => "Y",
        "SET_STATUS_404"                   => "N",
        "SET_TITLE"                        => "Y",

        "SHOW_404"                         => "N",
        "SHOW_DEACTIVATED"                 => "N",
        "SHOW_DISCOUNT_PERCENT"            => "Y",
        "SHOW_MAX_QUANTITY"                => "N",
        "SHOW_OLD_PRICE"                   => "Y",
        "SHOW_PRICE_COUNT"                 => 1,
        "SHOW_SKU_DESCRIPTION"             => "N",
        "SHOW_TOP_ELEMENTS"                => "Y",

        "TOP_ADD_TO_BASKET_ACTION"         => "ADD",
        "TOP_ELEMENT_COUNT"                => 6,
        "TOP_ELEMENT_SORT_FIELD"           => "sort",
        "TOP_ELEMENT_SORT_FIELD2"          => "id",
        "TOP_ELEMENT_SORT_ORDER"           => "asc",
        "TOP_ELEMENT_SORT_ORDER2"          => "desc",

        "TOP_LINE_ELEMENT_COUNT"           => 3,
        "TOP_OFFERS_FIELD_CODE"            => ["NAME"],
        "TOP_OFFERS_LIMIT"                 => 3,
        "TOP_SHOW_SLIDER"                  => "Y",

        "USER_CONSENT"                     => "N",
        "USER_CONSENT_ID"                  => "0",
        "USER_CONSENT_IS_CHECKED"          => "Y",
        "USER_CONSENT_IS_LOADED"           => "N",
        "USE_BIG_DATA"                     => "Y",

        "USE_COMPARE"                      => "N",
        "USE_ELEMENT_COUNTER"              => "Y",
        "USE_ENHANCED_ECOMMERCE"           => "Y",

        "USE_FILTER"                       => "N",

        "USE_GIFTS_DETAIL"                 => "Y",
        "USE_GIFTS_MAIN_PR_SECTION_LIST"   => "Y",
        "USE_GIFTS_SECTION"                => "Y",

        "USE_MAIN_ELEMENT_SECTION"         => "Y",

        "USE_PRICE_COUNT"                  => "N",
        "USE_PRODUCT_QUANTITY"             => "N",

        "USE_SALE_BESTSELLERS"             => "Y",

        "USE_STORE"                        => "N"
    ]
); ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>