<!DOCTYPE html>
<?php

if (!defined('B_PROLOG_INCLUDED') or B_PROLOG_INCLUDED !== true) {
    die();
}

/* @global $APPLICATION \CMain */

/* @global $USER \CUser */

use Bitrix\Main\Application;
use Bitrix\Main\Loader;
use Bitrix\Main\Page\Asset;
use Riche\Breakpoint;

Loader::registerAutoLoadClasses(
    null,
    [
        'Riche\Breakpoint' => SITE_TEMPLATE_PATH . '/classes/Breakpoint.php',
        'Riche\Head'       => SITE_TEMPLATE_PATH . '/classes/Head.php',
        'Riche\Thumb'      => SITE_TEMPLATE_PATH . '/classes/Thumb.php',
        'Riche\Units'      => SITE_TEMPLATE_PATH . '/classes/Units.php'
    ]
);

Breakpoint::addbreakpointsToHead();

// region CSS

$styles = Asset::getInstance();

$styles->addCss(LOCAL_ASSETS . '/normalize-css/normalize.css');

$styles->addCss(SITE_TEMPLATE_PATH . '/styles/grid.css');

$styles->addCss(SITE_TEMPLATE_PATH . '/styles/common.css');
$styles->addCss(SITE_TEMPLATE_PATH . '/styles/components.css');

$styles->addCss(SITE_TEMPLATE_PATH . '/fonts/gordita/stylesheet.css');
$styles->addCss(SITE_TEMPLATE_PATH . '/fonts/hicon/style.css');

$styles->addCss(SITE_TEMPLATE_PATH . '/styles/layout.css');

//endregion

// region JS

$scripts = Asset::getInstance();

$scripts->addJs(LOCAL_ASSETS . '/js-cookie/dist/js.cookie.js');
$scripts->addJs(LOCAL_ASSETS . '/vanilla-lazyload/dist/lazyload.js');

$scripts->addJs(LOCAL_ASSETS . '/jquery/dist/jquery.js');
$scripts->addJs(LOCAL_ASSETS . '/jquery-sticky/jquery.sticky.js');

$scripts->addJs(SITE_TEMPLATE_PATH . '/scripts/lazyload.js');

$scripts->addJs(SITE_TEMPLATE_PATH . '/scripts/common.js');
$scripts->addJs(SITE_TEMPLATE_PATH . '/scripts/passiveListeners.js');

$scripts->setShowBodyScript(true);

//endregion

$currentDirectoryPath = Application::getInstance()->getContext()->getRequest()->getRequestedPageDirectory();

if ($currentDirectoryPath == '/') {

    $pageHtmlClasses = 'front';

}
else {

    $pageHtmlClasses = trim(implode(' ', explode('/', $currentDirectoryPath)));

}

$request = Application::getInstance()->getContext()->getRequest();

?>
<html lang="<?php echo LANGUAGE_ID ?>" class="nojs">
<head>

    <title><?php $APPLICATION->ShowTitle(); ?></title>

    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo strtolower(SITE_CHARSET); ?>">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, viewport-fit=cover">

    <?php

    $APPLICATION->ShowMeta("robots");
    $APPLICATION->ShowMeta("keywords"); // устаревший тег

    $APPLICATION->ShowMeta("description");
    $APPLICATION->ShowLink("canonical");

    ?>

    <?php //region favicon ?>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo SITE_TEMPLATE_PATH; ?>/favicons/favicon.ico"/>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo SITE_TEMPLATE_PATH; ?>/favicons/apple-touch-icon.png">

    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo SITE_TEMPLATE_PATH; ?>/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo SITE_TEMPLATE_PATH; ?>/favicons/favicon-16x16.png">

    <link rel="mask-icon" href="<?php echo SITE_TEMPLATE_PATH; ?>/favicons/safari-pinned-tab.svg" color="#50e182">
    <link rel="manifest" href="<?php echo SITE_TEMPLATE_PATH; ?>/favicons/site.webmanifest">

    <meta name="apple-mobile-web-app-title" content="RICHE COSMETICS">
    <meta name="application-name" content="RICHE COSMETICS">
    <meta name="msapplication-TileColor" content="#50e182">
    <meta name="theme-color" content="#ffffff">

    <?php //endregion ?>

    <?php $APPLICATION->ShowCSS(true, false); ?>

    <script>const sessid = '<?= bitrix_sessid(); ?>';</script>

    <?php $APPLICATION->ShowHeadStrings(); ?>

</head>

<body id="page" class="<?php echo $pageHtmlClasses; ?>">

<?php $APPLICATION->ShowPanel(); ?>

<nav id="page--header">

    <div class="wrap">

        <div class="row header">

            <div id="page--header--logo" class="third">

                <?php if ($currentDirectoryPath == "/") { ?>

                    <picture>

                        <source srcset="<?php echo SITE_TEMPLATE_PATH; ?>/images/logo.svg"
                                media="<?= Breakpoint::getMedia('mobile'); ?>">
                        <source srcset="<?php echo SITE_TEMPLATE_PATH; ?>/images/logo--full.svg"
                                media="<?= Breakpoint::getMedia('tablet'); ?>">

                        <img loading="eager"
                             alt="RICHE"
                             class="logo">

                    </picture>

                <?php } else { ?>

                    <a href="/">

                        <picture>

                            <source srcset="<?php echo SITE_TEMPLATE_PATH; ?>/images/logo.svg"
                                    media="<?= Breakpoint::getMedia('mobile'); ?>">
                            <source srcset="<?php echo SITE_TEMPLATE_PATH; ?>/images/logo--full.svg"
                                    media="<?= Breakpoint::getMedia('tablet'); ?>">

                            <img loading="eager"
                                 alt="RICHE"
                                 class="logo">

                        </picture>

                    </a>

                <?php } ?>

            </div>

            <div id="page--header--menu" class="third mobiles-only">

                <?php $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "header",
                    [
                        "ROOT_MENU_TYPE"        => "main",
                        "ALLOW_MULTI_SELECT"    => "N",
                        "CHILD_MENU_TYPE"       => "local",
                        "DELAY"                 => "N",
                        "MAX_LEVEL"             => 1,
                        "MENU_CACHE_GET_VARS"   => [""],
                        "MENU_CACHE_TIME"       => CACHE_TTL,
                        "MENU_CACHE_TYPE"       => "A",
                        "MENU_CACHE_USE_GROUPS" => "N",
                        "USE_EXT"               => "N",
                        "CACHE_SELECTED_ITEMS"  => "N",

                        "COMPOSITE_FRAME_MODE" => "A",
                        "COMPOSITE_FRAME_TYPE" => "AUTO"
                    ]
                ); ?>

            </div>

            <div id="page--header--buttons" class="third">

                <?php $APPLICATION->IncludeComponent(
                    "bitrix:sale.basket.basket.line",
                    "header",
                    [
                        "PATH_TO_BASKET" => ORDER_URL,
                        "PATH_TO_ORDER"  => ORDER_URL,

                        "SHOW_PRODUCTS"     => "N",
                        "SHOW_NUM_PRODUCTS" => "Y",
                        "SHOW_AUTHOR"       => "N",

                        "HIDE_ON_BASKET_PAGES" => "Y",

                        "COMPOSITE_FRAME_MODE" => "A",
                        "COMPOSITE_FRAME_TYPE" => "AUTO",
                    ]
                ); ?>

            </div>

        </div>

        <div class="row nav">

            <div class="two-thirds">

                <?php $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "main",
                    [
                        "ROOT_MENU_TYPE"        => "main",
                        "ALLOW_MULTI_SELECT"    => "N",
                        "CHILD_MENU_TYPE"       => "local",
                        "DELAY"                 => "N",
                        "MAX_LEVEL"             => 1,
                        "MENU_CACHE_GET_VARS"   => [""],
                        "MENU_CACHE_TIME"       => CACHE_TTL,
                        "MENU_CACHE_TYPE"       => "A",
                        "MENU_CACHE_USE_GROUPS" => "N",
                        "USE_EXT"               => "N",
                        "CACHE_SELECTED_ITEMS"  => "N",

                        "COMPOSITE_FRAME_MODE" => "A",
                        "COMPOSITE_FRAME_TYPE" => "AUTO"
                    ]
                ); ?>

            </div>

            <div class="third hide--on-mobiles">

                <?php $APPLICATION->IncludeComponent(
                    'bitrix:main.include',
                    '',
                    [
                        "AREA_FILE_SHOW"      => "sect",
                        "AREA_FILE_SUFFIX"    => "header",
                        "AREA_FILE_RECURSIVE" => "N",

                        "COMPOSITE_FRAME_MODE" => "A",
                        "COMPOSITE_FRAME_TYPE" => "AUTO",
                    ],
                    false
                ); ?>

            </div>

        </div>

    </div>

</nav>

<main id="page--main">

    <?php if ($currentDirectoryPath !== "/") { ?>

        <header id="page--main--header" class="wrap">

            <?php if ($APPLICATION->GetDirProperty('HIDE_BREADCRUMBS') !== 'Y') { ?>

                <?php $APPLICATION->IncludeComponent(
                    "bitrix:breadcrumb",
                    "",
                    [
                        "SITE_ID"    => SITE_ID,
                        "START_FROM" => 0,

                        "COMPOSITE_FRAME_MODE" => "A",
                        "COMPOSITE_FRAME_TYPE" => "AUTO"
                    ],
                    false,
                    ["HIDE_ICONS" => "Y"]
                ); ?>

            <?php } ?>

            <?php if ($APPLICATION->GetDirProperty('HIDE_TITLE') !== 'Y') { ?>

                <h1><?php $APPLICATION->ShowTitle(); ?></h1>

            <?php } ?>

            <?php $APPLICATION->IncludeComponent(
                'bitrix:main.include',
                '.wrap',
                [
                    "AREA_FILE_SHOW"      => "sect",
                    "AREA_FILE_SUFFIX"    => "above",
                    "AREA_FILE_RECURSIVE" => "N",

                    "COMPOSITE_FRAME_MODE" => "A",
                    "COMPOSITE_FRAME_TYPE" => "AUTO",
                ],
                false
            ); ?>

        </header>

    <?php } ?>
