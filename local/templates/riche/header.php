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
    use Riche\Head;
    use Riche\PreloadLinks;
    use Riche\Template;

    Loader::registerAutoLoadClasses(
        null,
        [
            'Riche\Breakpoint' => SITE_TEMPLATE_PATH . '/classes/Breakpoint.php',
            'Riche\Head'       => SITE_TEMPLATE_PATH . '/classes/Head.php',
            'Riche\Thumb'      => SITE_TEMPLATE_PATH . '/classes/Thumb.php',
        ]
    );

    $assets = Asset::getInstance();

    $assets->addCss(LOCAL_ASSET . '/normalize-css/normalize.css');

    $assets->addJs(LOCAL_ASSET . '/js-cookie/dist/js.cookie.min.js');
    $assets->addJs(LOCAL_ASSET . '/vanilla-lazyload/dist/lazyload.min.js');

    $assets->addJs(LOCAL_ASSET . '/jquery/dist/jquery.min.js');
    $assets->addJs(LOCAL_ASSET . '/jquery-sticky/jquery.sticky.js');

    $assets->addJs(SITE_TEMPLATE_PATH . '/scripts/lazyload.js');
    $assets->addJs(SITE_TEMPLATE_PATH . '/scripts/common.js');

    $assets->addCss(SITE_TEMPLATE_PATH . '/styles/grid.css');

    $assets->addCss(SITE_TEMPLATE_PATH . '/styles/common.css');

    $assets->addCss(SITE_TEMPLATE_PATH . '/fonts/gordita/stylesheet.css');
    $assets->addCss(SITE_TEMPLATE_PATH . '/fonts/iconly/style.css', true);

    $assets->addCss(SITE_TEMPLATE_PATH . '/styles/layout.css');

    Head::addHeadPreloadAsset(SITE_TEMPLATE_PATH . '/images/logo.svg');

    $currentDirectoryPath = Application::getInstance()->getContext()->getRequest()->getRequestedPageDirectory();

    if ($currentDirectoryPath == '') {

        $pageHtmlClasses = 'front';

    }
    else {

        $pageHtmlClasses = str_replace(DIRECTORY_SEPARATOR, '--', ltrim(strtolower($currentDirectoryPath), DIRECTORY_SEPARATOR));

    }

    $request = Application::getInstance()->getContext()->getRequest();

?>
<html lang="<?php echo LANGUAGE_ID ?>">
<head>

    <title><?php $APPLICATION->ShowTitle(); ?></title>

    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo strtolower(SITE_CHARSET); ?>">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, viewport-fit=cover">

    <?php

        $APPLICATION->ShowHeadStrings();

        $APPLICATION->ShowMeta("robots", false, true);
        $APPLICATION->ShowMeta("keywords", false, true);

        $APPLICATION->ShowMeta("description", false, true);
        $APPLICATION->ShowLink("canonical", null, true);

    ?>

    <?php //region  favicon ?>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo SITE_TEMPLATE_PATH; ?>/favicons/favicon.ico"/>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo SITE_TEMPLATE_PATH; ?>/favicons/apple-touch-icon.png">

    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo SITE_TEMPLATE_PATH; ?>/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo SITE_TEMPLATE_PATH; ?>/favicons/favicon-16x16.png">

    <link rel="mask-icon" href="<?php echo SITE_TEMPLATE_PATH; ?>/favicons/safari-pinned-tab.svg" color="#00a300">

    <link rel="manifest" href="<?php echo SITE_TEMPLATE_PATH; ?>/site.webmanifest">

    <meta name="msapplication-TileColor" content="#00a300">
    <meta name="theme-color" content="#ffffff">

    <?php //endregion ?>

    <?php

        $APPLICATION->ShowCSS(true, false);
        $APPLICATION->ShowHeadScripts();

    ?>

    </noindex>

</head>

<body id="page" class="<?php echo $pageHtmlClasses; ?>">

<?php $APPLICATION->ShowPanel(); ?>

<div id="page--header">

    <div class="wrap">

        <div class="row">

            <div id="page--header--logo" class="quarter">

                <?php if ($currentDirectoryPath == "") { ?>

                        <img src="<?php echo SITE_TEMPLATE_PATH; ?>/images/logo.svg"
                             loading="eager"
                             alt="RICHE"
                             class="logo">

                <?php } else { ?>

                        <a href="/">
                            <img src="<?php echo SITE_TEMPLATE_PATH; ?>/images/logo.svg"
                                 loading="eager"
                                 alt="RICHE"
                                 class="logo">
                        </a>

                <?php } ?>

            </div>

            <div id="page--header--menu" class="half">

                <?php
                    $APPLICATION->IncludeComponent(
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

            </div>

        </div>

    </div>

</div>

<div id="page--main">

    <?php if ($APPLICATION->GetDirProperty('HIDE_TITLE') !== 'Y' && $currentDirectoryPath !== '') { ?>

            <header id="page--main--header">

                <div class="wrap">

                    <?php if ($APPLICATION->GetDirProperty('HIDE_BREADCRUMBS') !== 'Y' && $currentDirectoryPath !== "") { ?>

                            <?php $APPLICATION->IncludeComponent(
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

                    <?php } ?>

                    <h1><?php $APPLICATION->ShowTitle(); ?></h1>

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

            </header>

        <?php } ?>

    <div id="page--main--content">
