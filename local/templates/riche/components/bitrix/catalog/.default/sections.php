<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */

/** @var CBitrixComponent $component */


use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;

/**
 *
 * Это корень каталога
 * Здесь должны быть какие-то компоненты.
 * Наверное, списоок топа товаров, список разделов как минимум.
 * Ну ещё поиск.
 * Пока не знаю, что ещё.
 *
 **/

$this->setFrameMode(true);

$arParams['USE_FILTER'] = (isset($arParams['USE_FILTER']) && $arParams['USE_FILTER'] == 'Y' ? 'Y' : 'N');

$isFilter = ($arParams['USE_FILTER'] == 'Y');

if ($isFilter) {

    $arFilter = [
        "IBLOCK_ID"     => $arParams["IBLOCK_ID"],
        "ACTIVE"        => "Y",
        "GLOBAL_ACTIVE" => "Y",
    ];

    if (0 < intval($arResult["VARIABLES"]["SECTION_ID"])) {
        $arFilter["ID"] = $arResult["VARIABLES"]["SECTION_ID"];
    }
    elseif ('' != $arResult["VARIABLES"]["SECTION_CODE"]) {
        $arFilter["=CODE"] = $arResult["VARIABLES"]["SECTION_CODE"];
    }

    $obCache = new CPHPCache();

    if ($obCache->InitCache(CACHE_TTL, serialize($arFilter), "/iblock/catalog")) {

        $arCurSection = $obCache->GetVars();

    }
    elseif ($obCache->StartDataCache()) {

        $arCurSection = [];

        if (Loader::includeModule("iblock")) {

            $dbRes = CIBlockSection::GetList([], $arFilter, false, ["ID"]);

            if (defined("BX_COMP_MANAGED_CACHE")) {

                global $CACHE_MANAGER;

                $CACHE_MANAGER->StartTagCache("/iblock/catalog");

                if ($arCurSection = $dbRes->Fetch()) {
                    $CACHE_MANAGER->RegisterTag("iblock_id_" . $arParams["IBLOCK_ID"]);
                }

                $CACHE_MANAGER->EndTagCache();

            }
            else {

                if (!$arCurSection = $dbRes->Fetch()) {
                    $arCurSection = [];
                }

            }
        }

        $obCache->EndDataCache($arCurSection);

    }

    if (!isset($arCurSection)) {
        $arCurSection = [];
    }

}

$sectionListParams = [
    "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
    "IBLOCK_ID"   => $arParams["IBLOCK_ID"],

    "CACHE_TYPE"   => $arParams["CACHE_TYPE"],
    "CACHE_TIME"   => $arParams["CACHE_TIME"],
    "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],

    "COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
    "TOP_DEPTH"      => $arParams["SECTION_TOP_DEPTH"],
    "SECTION_URL"    => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
    "VIEW_MODE"      => $arParams["SECTIONS_VIEW_MODE"],

    "SHOW_PARENT_NAME"  => $arParams["SECTIONS_SHOW_PARENT_NAME"],
    "HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),

    "ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : '')
];

if ($sectionListParams["COUNT_ELEMENTS"] === "Y") {

    $sectionListParams["COUNT_ELEMENTS_FILTER"] = "CNT_ACTIVE";

    if ($arParams["HIDE_NOT_AVAILABLE"] == "Y") {
        $sectionListParams["COUNT_ELEMENTS_FILTER"] = "CNT_AVAILABLE";
    }

}

if (isset($arParams['USE_COMMON_SETTINGS_BASKET_POPUP']) && $arParams['USE_COMMON_SETTINGS_BASKET_POPUP'] == 'Y') {
    $basketAction = isset($arParams['COMMON_ADD_TO_BASKET_ACTION']) ? $arParams['COMMON_ADD_TO_BASKET_ACTION'] : '';
}
else {
    $basketAction = isset($arParams['SECTION_ADD_TO_BASKET_ACTION']) ? $arParams['SECTION_ADD_TO_BASKET_ACTION'] : '';
}

?>

<div class="catalog--default sections">

    <? $APPLICATION->IncludeComponent(
        "bitrix:catalog.section.list",
        "",
        $sectionListParams,
        $component,
        ($arParams["SHOW_TOP_ELEMENTS"] !== "N" ? ["HIDE_ICONS" => "Y"] : [])
    ); ?>

    <?
    //if ($arParams["USE_COMPARE"] === "Y") {
    //
    //    $APPLICATION->IncludeComponent(
    //        "bitrix:catalog.compare.list",
    //        "",
    //        [
    //            "IBLOCK_TYPE"         => $arParams["IBLOCK_TYPE"],
    //            "IBLOCK_ID"           => $arParams["IBLOCK_ID"],
    //            "NAME"                => $arParams["COMPARE_NAME"],
    //            "DETAIL_URL"          => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["element"],
    //            "COMPARE_URL"         => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["compare"],
    //            "ACTION_VARIABLE"     => (!empty($arParams["ACTION_VARIABLE"]) ? $arParams["ACTION_VARIABLE"] : "action"),
    //            "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
    //            'POSITION_FIXED'      => isset($arParams['COMPARE_POSITION_FIXED']) ? $arParams['COMPARE_POSITION_FIXED'] : '',
    //            'POSITION'            => isset($arParams['COMPARE_POSITION']) ? $arParams['COMPARE_POSITION'] : ''
    //        ],
    //        $component,
    //        ["HIDE_ICONS" => "Y"]
    //    );
    //
    //}
    ?>

    <? if ($isFilter): ?>

        <? $APPLICATION->IncludeComponent(
            "bitrix:catalog.smart.filter",
            "",
            [
                "IBLOCK_TYPE"         => $arParams["IBLOCK_TYPE"],
                "IBLOCK_ID"           => $arParams["IBLOCK_ID"],
                "SECTION_ID"          => $arCurSection['ID'],
                "FILTER_NAME"         => $arParams["FILTER_NAME"],
                "PRICE_CODE"          => $arParams["~PRICE_CODE"],
                "CACHE_TYPE"          => $arParams["CACHE_TYPE"],
                "CACHE_TIME"          => $arParams["CACHE_TIME"],
                "CACHE_GROUPS"        => $arParams["CACHE_GROUPS"],
                "SAVE_IN_SESSION"     => "N",
                "FILTER_VIEW_MODE"    => $arParams["FILTER_VIEW_MODE"],
                "XML_EXPORT"          => "N",
                "SECTION_TITLE"       => "NAME",
                "SECTION_DESCRIPTION" => "DESCRIPTION",
                'HIDE_NOT_AVAILABLE'  => $arParams["HIDE_NOT_AVAILABLE"],
                "TEMPLATE_THEME"      => $arParams["TEMPLATE_THEME"],
                'CONVERT_CURRENCY'    => $arParams['CONVERT_CURRENCY'],
                'CURRENCY_ID'         => $arParams['CURRENCY_ID'],
                "SEF_MODE"            => $arParams["SEF_MODE"],
                "SEF_RULE"            => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["smart_filter"],
                "SMART_FILTER_PATH"   => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
                "PAGER_PARAMS_NAME"   => $arParams["PAGER_PARAMS_NAME"],
                "INSTANT_RELOAD"      => $arParams["INSTANT_RELOAD"],
            ],
            $component,
            ['HIDE_ICONS' => 'Y']
        ); ?>

    <? endif ?>


    <? if (ModuleManager::isModuleInstalled("sale")) {

        $arRecomData  = [];
        $recomCacheID = ['IBLOCK_ID' => $arParams['IBLOCK_ID']];
        $obCache      = new CPHPCache();

        if ($obCache->InitCache($CACHE_MANAGER, serialize($recomCacheID), "/sale/bestsellers")) {

            $arRecomData = $obCache->GetVars();

        }
        elseif ($obCache->StartDataCache()) {

            if (Loader::includeModule("catalog")) {

                $arSKU                          = CCatalogSku::GetInfoByProductIBlock($arParams['IBLOCK_ID']);
                $arRecomData['OFFER_IBLOCK_ID'] = (!empty($arSKU) ? $arSKU['IBLOCK_ID'] : 0);

            }

            $obCache->EndDataCache($arRecomData);

        }
        ?>

        <? if (!empty($arRecomData) && $arParams['USE_GIFTS_SECTION'] === 'Y') { ?>

            <? if (!isset($arParams['GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE']) || $arParams['GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE'] !== 'Y') { ?>

                <?= ($arParams['GIFTS_SECTION_LIST_BLOCK_TITLE'] ? : Loc::getMessage('CT_GIFTS_SECTION_LIST_BLOCK_TITLE_DEFAULT')) ?>

            <? } ?>

            <? CBitrixComponent::includeComponentClass('bitrix:sale.products.gift.section'); ?>

            <? $APPLICATION->IncludeComponent(
                'bitrix:sale.products.gift.section',
                '.default',
                [
                    'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
                    'IBLOCK_ID'   => $arParams['IBLOCK_ID'],

                    'SECTION_ID'          => $arResult['VARIABLES']['SECTION_ID'],
                    'SECTION_CODE'        => $arResult['VARIABLES']['SECTION_CODE'],
                    'SECTION_ID_VARIABLE' => $arParams['SECTION_ID_VARIABLE'],

                    'PRODUCT_ID_VARIABLE' => $arParams['PRODUCT_ID_VARIABLE'],
                    'ACTION_VARIABLE'     => (!empty($arParams['ACTION_VARIABLE']) ? $arParams['ACTION_VARIABLE'] : 'action') . '_spgs',

                    'PRODUCT_ROW_VARIANTS'          => \Bitrix\Main\Web\Json::encode(
                        SaleProductsGiftSectionComponent::predictRowVariants(
                            $arParams['GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT'],
                            $arParams['GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT']
                        )
                    ),
                    'PAGE_ELEMENT_COUNT'            => $arParams['GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT'],
                    'DEFERRED_PRODUCT_ROW_VARIANTS' => '',
                    'DEFERRED_PAGE_ELEMENT_COUNT'   => 0,

                    'SHOW_DISCOUNT_PERCENT'     => $arParams['GIFTS_SHOW_DISCOUNT_PERCENT'],
                    'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
                    'SHOW_OLD_PRICE'            => $arParams['GIFTS_SHOW_OLD_PRICE'],
                    'PRODUCT_DISPLAY_MODE'      => 'Y',
                    'PRODUCT_BLOCKS_ORDER'      => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
                    'SHOW_SLIDER'               => $arParams['LIST_SHOW_SLIDER'],
                    'SLIDER_INTERVAL'           => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
                    'SLIDER_PROGRESS'           => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',

                    'TEXT_LABEL_GIFT' => $arParams['GIFTS_DETAIL_TEXT_LABEL_GIFT'],

                    'LABEL_PROP_' . $arParams['IBLOCK_ID']        => [],
                    'LABEL_PROP_MOBILE_' . $arParams['IBLOCK_ID'] => [],
                    'LABEL_PROP_POSITION'                         => $arParams['LABEL_PROP_POSITION'],

                    'ADD_TO_BASKET_ACTION'   => $basketAction,
                    'MESS_BTN_BUY'           => $arParams['~GIFTS_MESS_BTN_BUY'],
                    'MESS_BTN_ADD_TO_BASKET' => $arParams['~GIFTS_MESS_BTN_BUY'],
                    'MESS_BTN_DETAIL'        => $arParams['~MESS_BTN_DETAIL'],
                    'MESS_BTN_SUBSCRIBE'     => $arParams['~MESS_BTN_SUBSCRIBE'],

                    'PROPERTY_CODE'        => (isset($arParams['LIST_PROPERTY_CODE']) ? $arParams['LIST_PROPERTY_CODE'] : []),
                    'PROPERTY_CODE_MOBILE' => $arParams['LIST_PROPERTY_CODE_MOBILE'],
                    'ADD_PICT_PROP'        => $arParams['ADD_PICT_PROP'],

                    'OFFERS_FIELD_CODE'      => $arParams['LIST_OFFERS_FIELD_CODE'],
                    'OFFERS_PROPERTY_CODE'   => (isset($arParams['LIST_OFFERS_PROPERTY_CODE']) ? $arParams['LIST_OFFERS_PROPERTY_CODE'] : []),
                    'OFFER_TREE_PROPS'       => (isset($arParams['OFFER_TREE_PROPS']) ? $arParams['OFFER_TREE_PROPS'] : []),
                    'OFFERS_CART_PROPERTIES' => (isset($arParams['OFFERS_CART_PROPERTIES']) ? $arParams['OFFERS_CART_PROPERTIES'] : []),
                    'OFFER_ADD_PICT_PROP'    => $arParams['OFFER_ADD_PICT_PROP'],

                    'HIDE_NOT_AVAILABLE'         => 'Y',
                    'HIDE_NOT_AVAILABLE_OFFERS'  => 'Y',
                    'PRODUCT_SUBSCRIPTION'       => $arParams['PRODUCT_SUBSCRIPTION'],
                    'TEMPLATE_THEME'             => $arParams['TEMPLATE_THEME'],
                    'PRICE_CODE'                 => $arParams['~PRICE_CODE'],
                    'SHOW_PRICE_COUNT'           => $arParams['SHOW_PRICE_COUNT'],
                    'PRICE_VAT_INCLUDE'          => $arParams['PRICE_VAT_INCLUDE'],
                    'CONVERT_CURRENCY'           => $arParams['CONVERT_CURRENCY'],
                    'BASKET_URL'                 => $arParams['BASKET_URL'],
                    'ADD_PROPERTIES_TO_BASKET'   => $arParams['ADD_PROPERTIES_TO_BASKET'],
                    'PRODUCT_PROPS_VARIABLE'     => $arParams['PRODUCT_PROPS_VARIABLE'],
                    'PARTIAL_PRODUCT_PROPERTIES' => $arParams['PARTIAL_PRODUCT_PROPERTIES'],
                    'USE_PRODUCT_QUANTITY'       => 'N',
                    'PRODUCT_QUANTITY_VARIABLE'  => $arParams['PRODUCT_QUANTITY_VARIABLE'],
                    'CACHE_GROUPS'               => $arParams['CACHE_GROUPS'],

                    'USE_ENHANCED_ECOMMERCE' => (isset($arParams['USE_ENHANCED_ECOMMERCE']) ? $arParams['USE_ENHANCED_ECOMMERCE'] : ''),
                    'DATA_LAYER_NAME'        => (isset($arParams['DATA_LAYER_NAME']) ? $arParams['DATA_LAYER_NAME'] : ''),
                    'BRAND_PROPERTY'         => (isset($arParams['BRAND_PROPERTY']) ? $arParams['BRAND_PROPERTY'] : ''),
                ],
                $component,
                ["HIDE_ICONS" => "Y"]
            ); ?>

        <? } ?>

    <? } ?>

    <?

    if (isset($arParams['USE_COMMON_SETTINGS_BASKET_POPUP']) && $arParams['USE_COMMON_SETTINGS_BASKET_POPUP'] === 'Y') {
        $basketAction = isset($arParams['COMMON_ADD_TO_BASKET_ACTION']) ? $arParams['COMMON_ADD_TO_BASKET_ACTION'] : '';
    }
    else {
        $basketAction = isset($arParams['TOP_ADD_TO_BASKET_ACTION']) ? $arParams['TOP_ADD_TO_BASKET_ACTION'] : '';
    }

    $APPLICATION->IncludeComponent(
        "bitrix:catalog.top",
        "",
        [
            "IBLOCK_TYPE"                => $arParams["IBLOCK_TYPE"],
            "IBLOCK_ID"                  => $arParams["IBLOCK_ID"],
            "ELEMENT_SORT_FIELD"         => $arParams["TOP_ELEMENT_SORT_FIELD"],
            "ELEMENT_SORT_ORDER"         => $arParams["TOP_ELEMENT_SORT_ORDER"],
            "ELEMENT_SORT_FIELD2"        => $arParams["TOP_ELEMENT_SORT_FIELD2"],
            "ELEMENT_SORT_ORDER2"        => $arParams["TOP_ELEMENT_SORT_ORDER2"],
            "SECTION_URL"                => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
            "DETAIL_URL"                 => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["element"],
            "BASKET_URL"                 => $arParams["BASKET_URL"],
            "ACTION_VARIABLE"            => $arParams["ACTION_VARIABLE"],
            "PRODUCT_ID_VARIABLE"        => $arParams["PRODUCT_ID_VARIABLE"],
            "PRODUCT_QUANTITY_VARIABLE"  => $arParams["PRODUCT_QUANTITY_VARIABLE"],
            "PRODUCT_PROPS_VARIABLE"     => $arParams["PRODUCT_PROPS_VARIABLE"],
            "DISPLAY_COMPARE"            => $arParams["USE_COMPARE"],
            "ELEMENT_COUNT"              => $arParams["TOP_ELEMENT_COUNT"],
            "LINE_ELEMENT_COUNT"         => $arParams["TOP_LINE_ELEMENT_COUNT"],
            "PROPERTY_CODE"              => (isset($arParams["TOP_PROPERTY_CODE"]) ? $arParams["TOP_PROPERTY_CODE"] : []),
            "PROPERTY_CODE_MOBILE"       => $arParams["TOP_PROPERTY_CODE_MOBILE"],
            "PRICE_CODE"                 => $arParams["~PRICE_CODE"],
            "USE_PRICE_COUNT"            => $arParams["USE_PRICE_COUNT"],
            "SHOW_PRICE_COUNT"           => $arParams["SHOW_PRICE_COUNT"],
            "PRICE_VAT_INCLUDE"          => $arParams["PRICE_VAT_INCLUDE"],
            "PRICE_VAT_SHOW_VALUE"       => $arParams["PRICE_VAT_SHOW_VALUE"],
            "USE_PRODUCT_QUANTITY"       => $arParams['USE_PRODUCT_QUANTITY'],
            "ADD_PROPERTIES_TO_BASKET"   => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
            "PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
            "PRODUCT_PROPERTIES"         => (isset($arParams["PRODUCT_PROPERTIES"]) ? $arParams["PRODUCT_PROPERTIES"] : []),
            "CACHE_TYPE"                 => $arParams["CACHE_TYPE"],
            "CACHE_TIME"                 => $arParams["CACHE_TIME"],
            "CACHE_GROUPS"               => $arParams["CACHE_GROUPS"],
            "OFFERS_CART_PROPERTIES"     => (isset($arParams["OFFERS_CART_PROPERTIES"]) ? $arParams["OFFERS_CART_PROPERTIES"] : []),
            "OFFERS_FIELD_CODE"          => $arParams["TOP_OFFERS_FIELD_CODE"],
            "OFFERS_PROPERTY_CODE"       => (isset($arParams["TOP_OFFERS_PROPERTY_CODE"]) ? $arParams["TOP_OFFERS_PROPERTY_CODE"] : []),
            "OFFERS_SORT_FIELD"          => $arParams["OFFERS_SORT_FIELD"],
            "OFFERS_SORT_ORDER"          => $arParams["OFFERS_SORT_ORDER"],
            "OFFERS_SORT_FIELD2"         => $arParams["OFFERS_SORT_FIELD2"],
            "OFFERS_SORT_ORDER2"         => $arParams["OFFERS_SORT_ORDER2"],
            "OFFERS_LIMIT"               => (isset($arParams["TOP_OFFERS_LIMIT"]) ? $arParams["TOP_OFFERS_LIMIT"] : 0),
            'CONVERT_CURRENCY'           => $arParams['CONVERT_CURRENCY'],
            'CURRENCY_ID'                => $arParams['CURRENCY_ID'],
            'HIDE_NOT_AVAILABLE'         => $arParams['HIDE_NOT_AVAILABLE'],
            'VIEW_MODE'                  => (isset($arParams['TOP_VIEW_MODE']) ? $arParams['TOP_VIEW_MODE'] : ''),
            'ROTATE_TIMER'               => (isset($arParams['TOP_ROTATE_TIMER']) ? $arParams['TOP_ROTATE_TIMER'] : ''),
            'TEMPLATE_THEME'             => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),

            'LABEL_PROP'           => $arParams['LABEL_PROP'],
            'LABEL_PROP_MOBILE'    => $arParams['LABEL_PROP_MOBILE'],
            'LABEL_PROP_POSITION'  => $arParams['LABEL_PROP_POSITION'],
            'ADD_PICT_PROP'        => $arParams['ADD_PICT_PROP'],
            'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
            'PRODUCT_BLOCKS_ORDER' => $arParams['TOP_PRODUCT_BLOCKS_ORDER'],
            'PRODUCT_ROW_VARIANTS' => $arParams['TOP_PRODUCT_ROW_VARIANTS'],
            'ENLARGE_PRODUCT'      => $arParams['TOP_ENLARGE_PRODUCT'],
            'ENLARGE_PROP'         => isset($arParams['TOP_ENLARGE_PROP']) ? $arParams['TOP_ENLARGE_PROP'] : '',
            'SHOW_SLIDER'          => $arParams['TOP_SHOW_SLIDER'],
            'SLIDER_INTERVAL'      => isset($arParams['TOP_SLIDER_INTERVAL']) ? $arParams['TOP_SLIDER_INTERVAL'] : '',
            'SLIDER_PROGRESS'      => isset($arParams['TOP_SLIDER_PROGRESS']) ? $arParams['TOP_SLIDER_PROGRESS'] : '',

            'OFFER_ADD_PICT_PROP'       => $arParams['OFFER_ADD_PICT_PROP'],
            'OFFER_TREE_PROPS'          => (isset($arParams['OFFER_TREE_PROPS']) ? $arParams['OFFER_TREE_PROPS'] : []),
            'PRODUCT_SUBSCRIPTION'      => $arParams['PRODUCT_SUBSCRIPTION'],
            'SHOW_DISCOUNT_PERCENT'     => $arParams['SHOW_DISCOUNT_PERCENT'],
            'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
            'SHOW_OLD_PRICE'            => $arParams['SHOW_OLD_PRICE'],
            'MESS_BTN_BUY'              => $arParams['~MESS_BTN_BUY'],
            'MESS_BTN_ADD_TO_BASKET'    => $arParams['~MESS_BTN_ADD_TO_BASKET'],
            'MESS_BTN_SUBSCRIBE'        => $arParams['~MESS_BTN_SUBSCRIBE'],
            'MESS_BTN_DETAIL'           => $arParams['~MESS_BTN_DETAIL'],
            'MESS_NOT_AVAILABLE'        => $arParams['~MESS_NOT_AVAILABLE'],
            'ADD_TO_BASKET_ACTION'      => $basketAction,
            'SHOW_CLOSE_POPUP'          => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
            'COMPARE_PATH'              => $arResult['FOLDER'] . $arResult['URL_TEMPLATES']['compare'],
            'USE_COMPARE_LIST'          => 'Y',

            'COMPATIBLE_MODE' => (isset($arParams['COMPATIBLE_MODE']) ? $arParams['COMPATIBLE_MODE'] : '')
        ],
        $component,
        ["HIDE_ICONS" => "Y"]
    );

    ?>

    <? if (ModuleManager::isModuleInstalled("sale")) { ?>

        <? if (!empty($arRecomData)) { ?>

            <? if (!isset($arParams['USE_BIG_DATA']) || $arParams['USE_BIG_DATA'] != 'N') { ?>

                <?= GetMessage('CATALOG_PERSONAL_RECOM') ?>

                <? $APPLICATION->IncludeComponent(
                    "bitrix:catalog.section",
                    "",
                    [
                        "IBLOCK_TYPE"               => $arParams["IBLOCK_TYPE"],
                        "IBLOCK_ID"                 => $arParams["IBLOCK_ID"],
                        "ELEMENT_SORT_FIELD"        => $arParams["ELEMENT_SORT_FIELD"],
                        "ELEMENT_SORT_ORDER"        => $arParams["ELEMENT_SORT_ORDER"],
                        "ELEMENT_SORT_FIELD2"       => $arParams["ELEMENT_SORT_FIELD2"],
                        "ELEMENT_SORT_ORDER2"       => $arParams["ELEMENT_SORT_ORDER2"],
                        "PROPERTY_CODE"             => (isset($arParams["LIST_PROPERTY_CODE"]) ? $arParams["LIST_PROPERTY_CODE"] : []),
                        "PROPERTY_CODE_MOBILE"      => $arParams["LIST_PROPERTY_CODE_MOBILE"],
                        "INCLUDE_SUBSECTIONS"       => $arParams["INCLUDE_SUBSECTIONS"],
                        "BASKET_URL"                => $arParams["BASKET_URL"],
                        "ACTION_VARIABLE"           => $arParams["ACTION_VARIABLE"],
                        "PRODUCT_ID_VARIABLE"       => $arParams["PRODUCT_ID_VARIABLE"],
                        "SECTION_ID_VARIABLE"       => $arParams["SECTION_ID_VARIABLE"],
                        "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
                        "PRODUCT_PROPS_VARIABLE"    => $arParams["PRODUCT_PROPS_VARIABLE"],
                        "CACHE_TYPE"                => $arParams["CACHE_TYPE"],
                        "CACHE_TIME"                => $arParams["CACHE_TIME"],
                        "CACHE_FILTER"              => $arParams["CACHE_FILTER"],
                        "CACHE_GROUPS"              => $arParams["CACHE_GROUPS"],
                        "DISPLAY_COMPARE"           => $arParams["USE_COMPARE"],
                        "PAGE_ELEMENT_COUNT"        => 0,
                        "PRICE_CODE"                => $arParams["~PRICE_CODE"],
                        "USE_PRICE_COUNT"           => $arParams["USE_PRICE_COUNT"],
                        "SHOW_PRICE_COUNT"          => $arParams["SHOW_PRICE_COUNT"],

                        "SET_BROWSER_TITLE"    => "N",
                        "SET_META_KEYWORDS"    => "N",
                        "SET_META_DESCRIPTION" => "N",
                        "SET_LAST_MODIFIED"    => "N",
                        "ADD_SECTIONS_CHAIN"   => "N",

                        "PRICE_VAT_INCLUDE"          => $arParams["PRICE_VAT_INCLUDE"],
                        "USE_PRODUCT_QUANTITY"       => $arParams['USE_PRODUCT_QUANTITY'],
                        "ADD_PROPERTIES_TO_BASKET"   => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
                        "PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
                        "PRODUCT_PROPERTIES"         => (isset($arParams["PRODUCT_PROPERTIES"]) ? $arParams["PRODUCT_PROPERTIES"] : []),

                        "OFFERS_CART_PROPERTIES" => (isset($arParams["OFFERS_CART_PROPERTIES"]) ? $arParams["OFFERS_CART_PROPERTIES"] : []),
                        "OFFERS_FIELD_CODE"      => $arParams["LIST_OFFERS_FIELD_CODE"],
                        "OFFERS_PROPERTY_CODE"   => (isset($arParams["LIST_OFFERS_PROPERTY_CODE"]) ? $arParams["LIST_OFFERS_PROPERTY_CODE"] : []),
                        "OFFERS_SORT_FIELD"      => $arParams["OFFERS_SORT_FIELD"],
                        "OFFERS_SORT_ORDER"      => $arParams["OFFERS_SORT_ORDER"],
                        "OFFERS_SORT_FIELD2"     => $arParams["OFFERS_SORT_FIELD2"],
                        "OFFERS_SORT_ORDER2"     => $arParams["OFFERS_SORT_ORDER2"],
                        "OFFERS_LIMIT"           => (isset($arParams["LIST_OFFERS_LIMIT"]) ? $arParams["LIST_OFFERS_LIMIT"] : 0),

                        "SECTION_ID"                => $intSectionID,
                        "SECTION_CODE"              => "",
                        "SECTION_URL"               => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
                        "DETAIL_URL"                => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["element"],
                        "USE_MAIN_ELEMENT_SECTION"  => $arParams["USE_MAIN_ELEMENT_SECTION"],
                        'CONVERT_CURRENCY'          => $arParams['CONVERT_CURRENCY'],
                        'CURRENCY_ID'               => $arParams['CURRENCY_ID'],
                        'HIDE_NOT_AVAILABLE'        => $arParams["HIDE_NOT_AVAILABLE"],
                        'HIDE_NOT_AVAILABLE_OFFERS' => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],

                        'LABEL_PROP'           => $arParams['LABEL_PROP'],
                        'LABEL_PROP_MOBILE'    => $arParams['LABEL_PROP_MOBILE'],
                        'LABEL_PROP_POSITION'  => $arParams['LABEL_PROP_POSITION'],
                        'ADD_PICT_PROP'        => $arParams['ADD_PICT_PROP'],
                        'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
                        'PRODUCT_BLOCKS_ORDER' => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
                        'PRODUCT_ROW_VARIANTS' => "[{'VARIANT':'3','BIG_DATA':true}]",
                        'ENLARGE_PRODUCT'      => $arParams['LIST_ENLARGE_PRODUCT'],
                        'ENLARGE_PROP'         => isset($arParams['LIST_ENLARGE_PROP']) ? $arParams['LIST_ENLARGE_PROP'] : '',
                        'SHOW_SLIDER'          => $arParams['LIST_SHOW_SLIDER'],
                        'SLIDER_INTERVAL'      => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
                        'SLIDER_PROGRESS'      => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',

                        "DISPLAY_TOP_PAGER"        => 'N',
                        "DISPLAY_BOTTOM_PAGER"     => 'N',
                        "HIDE_SECTION_DESCRIPTION" => "Y",

                        "RCM_TYPE"          => isset($arParams['BIG_DATA_RCM_TYPE']) ? $arParams['BIG_DATA_RCM_TYPE'] : '',
                        "SHOW_FROM_SECTION" => 'Y',

                        'OFFER_ADD_PICT_PROP'         => $arParams['OFFER_ADD_PICT_PROP'],
                        'OFFER_TREE_PROPS'            => (isset($arParams['OFFER_TREE_PROPS']) ? $arParams['OFFER_TREE_PROPS'] : []),
                        'PRODUCT_SUBSCRIPTION'        => $arParams['PRODUCT_SUBSCRIPTION'],
                        'SHOW_DISCOUNT_PERCENT'       => $arParams['SHOW_DISCOUNT_PERCENT'],
                        'DISCOUNT_PERCENT_POSITION'   => $arParams['DISCOUNT_PERCENT_POSITION'],
                        'SHOW_OLD_PRICE'              => $arParams['SHOW_OLD_PRICE'],
                        'SHOW_MAX_QUANTITY'           => $arParams['SHOW_MAX_QUANTITY'],
                        'MESS_SHOW_MAX_QUANTITY'      => (isset($arParams['~MESS_SHOW_MAX_QUANTITY']) ? $arParams['~MESS_SHOW_MAX_QUANTITY'] : ''),
                        'RELATIVE_QUANTITY_FACTOR'    => (isset($arParams['RELATIVE_QUANTITY_FACTOR']) ? $arParams['RELATIVE_QUANTITY_FACTOR'] : ''),
                        'MESS_RELATIVE_QUANTITY_MANY' => (isset($arParams['~MESS_RELATIVE_QUANTITY_MANY']) ? $arParams['~MESS_RELATIVE_QUANTITY_MANY'] : ''),
                        'MESS_RELATIVE_QUANTITY_FEW'  => (isset($arParams['~MESS_RELATIVE_QUANTITY_FEW']) ? $arParams['~MESS_RELATIVE_QUANTITY_FEW'] : ''),
                        'MESS_BTN_BUY'                => (isset($arParams['~MESS_BTN_BUY']) ? $arParams['~MESS_BTN_BUY'] : ''),
                        'MESS_BTN_ADD_TO_BASKET'      => (isset($arParams['~MESS_BTN_ADD_TO_BASKET']) ? $arParams['~MESS_BTN_ADD_TO_BASKET'] : ''),
                        'MESS_BTN_SUBSCRIBE'          => (isset($arParams['~MESS_BTN_SUBSCRIBE']) ? $arParams['~MESS_BTN_SUBSCRIBE'] : ''),
                        'MESS_BTN_DETAIL'             => (isset($arParams['~MESS_BTN_DETAIL']) ? $arParams['~MESS_BTN_DETAIL'] : ''),
                        'MESS_NOT_AVAILABLE'          => (isset($arParams['~MESS_NOT_AVAILABLE']) ? $arParams['~MESS_NOT_AVAILABLE'] : ''),
                        'MESS_BTN_COMPARE'            => (isset($arParams['~MESS_BTN_COMPARE']) ? $arParams['~MESS_BTN_COMPARE'] : ''),

                        'USE_ENHANCED_ECOMMERCE' => (isset($arParams['USE_ENHANCED_ECOMMERCE']) ? $arParams['USE_ENHANCED_ECOMMERCE'] : ''),
                        'DATA_LAYER_NAME'        => (isset($arParams['DATA_LAYER_NAME']) ? $arParams['DATA_LAYER_NAME'] : ''),
                        'BRAND_PROPERTY'         => (isset($arParams['BRAND_PROPERTY']) ? $arParams['BRAND_PROPERTY'] : ''),

                        'TEMPLATE_THEME'               => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
                        'ADD_TO_BASKET_ACTION'         => $basketAction,
                        'SHOW_CLOSE_POPUP'             => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
                        'COMPARE_PATH'                 => $arResult['FOLDER'] . $arResult['URL_TEMPLATES']['compare'],
                        'COMPARE_NAME'                 => $arParams['COMPARE_NAME'],
                        'USE_COMPARE_LIST'             => 'Y',
                        'BACKGROUND_IMAGE'             => '',
                        'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : '')
                    ],
                    $component
                ); ?>

            <? } ?>

        <? } ?>

    <? } ?>

</div>
