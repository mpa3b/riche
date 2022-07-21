<!DOCTYPE html>
<?php if (!defined('B_PROLOG_INCLUDED') or B_PROLOG_INCLUDED !== true) die();

global $USER, $APPLICATION;

use Bitrix\Main\Application;
use Bitrix\Main\Loader;
use Bitrix\Main\Page\Asset;
use Riche\PreloadLinks;
use Riche\Template;

Loader::registerAutoLoadClasses(
    null,
    [
        'Riche\PreloadLinks' => SITE_TEMPLATE_PATH . '/classes/PreloadLinks.php',
        'Riche\Template'     => SITE_TEMPLATE_PATH . '/classes/Template.php',
        'Riche\Images'       => SITE_TEMPLATE_PATH . '/classes/Images.php'
    ]
);

$assets = Asset::getInstance();

if (DEBUG) {

    $assets->addCss(Template::ASSETS . '/normalize-css/normalize.css');

    $assets->addJs(Template::ASSETS . '/vanilla-lazyload/dist/lazyload.min.js');
    $assets->addJs(Template::ASSETS . '/jquery/dist/jquery.min.js');

} else {

    PreloadLinks::preconnectDomain('cdnjs.cloudflare.com');

    PreloadLinks::addHeadPrefetchAsset('https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css');
    PreloadLinks::addHeadPrefetchAsset('https://cdnjs.cloudflare.com/ajax/libs/vanilla-lazyload/17.3.1/lazyload.min.js');
    PreloadLinks::addHeadPrefetchAsset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js');

    PreloadLinks::addHeadPreloadAsset('https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css');
    PreloadLinks::addHeadPreloadAsset('https://cdnjs.cloudflare.com/ajax/libs/vanilla-lazyload/17.3.1/lazyload.min.js');
    PreloadLinks::addHeadPreloadAsset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js');

    $assets->addString('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />');
    $assets->addString('<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>');
    $assets->addString('<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-lazyload/17.3.1/lazyload.min.js" integrity="sha512-lVcnjCLGjJTaZU55wD7H3f8SJVi6VV5cQRcmGuYcyIY607N/rzZGEl90lNgsiEhKygATryG/i6e5u2moDFs5kQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>');

}

$assets->addJs(SITE_TEMPLATE_PATH . '/scripts/lazyload.js');

$assets->addJs(SITE_TEMPLATE_PATH . '/scripts/common.js');

$assets->addCss(SITE_TEMPLATE_PATH . '/styles/common.css');
$assets->addCss(SITE_TEMPLATE_PATH . '/styles/grid.css');
$assets->addCss(SITE_TEMPLATE_PATH . '/styles/layout.css');
$assets->addCss(SITE_TEMPLATE_PATH . '/icons/icons.css', true);

$assets->addCss(SITE_TEMPLATE_PATH . '/fonts/gordita/stylesheet.css');

PreloadLinks::addHeadPreloadAsset(SITE_TEMPLATE_PATH . '/images/logo.svg');

$currentDirectoryPath = Application::getInstance()->getContext()->getRequest()->getRequestedPageDirectory();

if ($currentDirectoryPath == '') {

    $pageHtmlClasses = 'front';

} else {

    $pageHtmlClasses = str_replace(DIRECTORY_SEPARATOR, '--', ltrim(strtolower($currentDirectoryPath), DIRECTORY_SEPARATOR));

}

$request = Application::getInstance()->getContext()->getRequest();

$cartUpdate = $request->getPost('cartUpdate');

$arCartParams = [
    "PATH_TO_CATALOG" => "/catalog/",
    "PATH_TO_BASKET"  => "/cart/",
    "PATH_TO_ORDER"   => "/cart/checkout/",

    "SHOW_NUM_PRODUCTS" => "Y",
    "SHOW_TOTAL_PRICE"  => "Y",
    "SHOW_PRODUCTS"     => "Y",
    "SHOW_SUMMARY"      => "Y",

    "HIDE_ON_BASKET_PAGES" => "Y",

    "COMPOSITE_FRAME_MODE" => "A",
    "COMPOSITE_FRAME_TYPE" => "AUTO"
];

if (IS_AJAX && $cartUpdate) {

    $APPLICATION->IncludeComponent(
        'bitrix:sale.basket.basket.line',
        'header',
        $arCartParams
    );

}

?>
<html lang="<?= LANGUAGE_ID ?>">
<head>

    <title><?php $APPLICATION->ShowTitle(); ?></title>

    <meta http-equiv="Content-Type" content="text/html; charset=<?= strtolower(SITE_CHARSET); ?>">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, viewport-fit=cover">

    <?php //region  favicon ?>

    <link rel="shortcut icon" type="image/x-icon" href="<?= SITE_TEMPLATE_PATH; ?>/favicons/favicon.ico"/>

    <link rel="apple-touch-icon" sizes="180x180" href="<?= SITE_TEMPLATE_PATH; ?>/favicons/apple-touch-icon.png">

    <link rel="icon" type="image/png" sizes="32x32" href="<?= SITE_TEMPLATE_PATH; ?>/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= SITE_TEMPLATE_PATH; ?>/favicons/favicon-16x16.png">

    <link rel="mask-icon" href="<?= SITE_TEMPLATE_PATH; ?>/favicons/safari-pinned-tab.svg" color="#00a300">

    <link rel="manifest" href="<?= SITE_TEMPLATE_PATH; ?>/site.webmanifest">

    <meta name="msapplication-TileColor" content="#00a300">
    <meta name="theme-color" content="#ffffff">

    <?php //endregion ?>

    <?php

    $APPLICATION->ShowMeta("robots", false, true);
    $APPLICATION->ShowMeta("keywords", false, true);

    $APPLICATION->ShowMeta("description", false, true);
    $APPLICATION->ShowLink("canonical", null, true);

    $APPLICATION->ShowHeadStrings();
    $APPLICATION->ShowHeadScripts();
    $APPLICATION->ShowCSS(true, false);

    ?>

    </noindex>

</head>

<body id="page" class="<?= $pageHtmlClasses; ?>">

<?php $APPLICATION->ShowPanel(); ?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'header-line',
    [
        'IBLOCK_TYPE'               => 'CONTENT',
        'IBLOCK_ID'                 => 2,
        'NEWS_COUNT'                => 5,
        'SORT_BY1'                  => 'ACTIVE_FROM ',
        'SORT_ORDER1'               => 'DESC ',
        'CHECK_DATES'               => 'Y',
        'SET_TITLE'                 => 'N',
        'SET_BROWSER_TITLE'         => 'N',
        'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
        'ADD_SECTIONS_CHAIN'        => 'N',

        'CACHE_TYPE' => 'A',

        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO"
    ]
); ?>

<div id="page--header">

    <div class="wrap">

        <div class="row">

            <div id="page--header--logo" class="quarter">

                <?php if ($currentDirectoryPath == "") { ?>

                    <img src="<?= SITE_TEMPLATE_PATH; ?>/images/logo.svg" loading="eager" alt="RICHE">

                <?php } else { ?>

                    <a href="/">
                        <img src="<?= SITE_TEMPLATE_PATH; ?>/images/logo.svg" loading="eager" alt="RICHE">
                    </a>

                <?php } ?>

            </div>

            <div id="page--header--menu" class="half">

                <?php $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "header",
                    [
                        "ALLOW_MULTI_SELECT"    => "N",
                        "CHILD_MENU_TYPE"       => "local",
                        "DELAY"                 => "N",
                        "MAX_LEVEL"             => 1,
                        "MENU_CACHE_GET_VARS"   => [""],
                        "MENU_CACHE_TIME"       => Template::CACHE_TIME,
                        "MENU_CACHE_TYPE"       => "A",
                        "MENU_CACHE_USE_GROUPS" => "N",
                        "ROOT_MENU_TYPE"        => "main",
                        "USE_EXT"               => "N",
                        "CACHE_SELECTED_ITEMS"  => "N",

                        "COMPOSITE_FRAME_MODE" => "A",
                        "COMPOSITE_FRAME_TYPE" => "AUTO"
                    ]
                ); ?>

            </div>

            <div id="page--header--buttons" class="quarter">

                <?php $APPLICATION->IncludeComponent(
                    "bitrix:search.form",
                    "header",
                    [
                        "USE_SUGGEST" => "N",
                        "PAGE"        => "/search/",

                        "COMPOSITE_FRAME_MODE" => "A",
                        "COMPOSITE_FRAME_TYPE" => "AUTO",
                    ]
                ); ?>

                <?php $APPLICATION->IncludeComponent(
                    'bitrix:sale.basket.basket.line',
                    'header',
                    $arCartParams
                ); ?>

            </div>

        </div>

    </div>

</div>

<div id="page--main">

    <? if ($APPLICATION->GetDirProperty('HIDE_TITLE') !== 'Y' && $currentDirectoryPath !== '') { ?>

        <header id="page--main--header">

            <div class="wrap">

                <? if ($APPLICATION->GetDirProperty('HIDE_BREADCRUMBS') !== 'Y' && $currentDirectoryPath !== "") { ?>

                    <? $APPLICATION->IncludeComponent(
                        "bitrix:breadcrumb",
                        "",
                        [
                            "PATH"       => "",
                            "SITE_ID"    => SITE_ID,
                            "START_FROM" => 0,

                            "COMPOSITE_FRAME_MODE" => "A",
                            "COMPOSITE_FRAME_TYPE" => "AUTO",
                        ],
                        false,
                        ["HIDE_ICONS" => "Y"]
                    ); ?>

                <? } ?>

                <h1><? $APPLICATION->ShowTitle(); ?></h1>

            </div>

            <? $APPLICATION->IncludeComponent(
                'bitrix:main.include',
                '.wrap',
                [
                    "AREA_FILE_SHOW"      => "sect",
                    "AREA_FILE_SUFFIX"    => "header",
                    "AREA_FILE_RECURSIVE" => "N",

                    "COMPOSITE_FRAME_MODE" => "A",
                    "COMPOSITE_FRAME_TYPE" => "AUTO",
                ],
                false
            ); ?>

        </header>

    <? } ?>

    <div id="page--main--content">