<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Application;
use Bitrix\Main\Composite\StaticArea;
use Bitrix\Main\Page\AssetMode;

global $USER, $APPLICATION;

$currentDirectoryPath = Application::getInstance()->getContext()->getRequest()->getRequestedPageDirectory();

$footerFrame = new StaticArea('page--footer');

$footerFrame->setStub('');

?>

</main>

<footer id="page--footer">

    <? $footerFrame->startDynamicArea(); ?>

    <div id="page--footer--top" class="wrap">

        <div class="row">

            <div id="page--footer--contact" class="two-fifths">

                <?php if ($currentDirectoryPath == "/") { ?>

                    <img src="<?= SITE_TEMPLATE_PATH; ?>/images/logo--full.svg"
                         class="logo"
                         loading="lazy">

                <? } else { ?>

                    <a href="/">
                        <img src="<?= SITE_TEMPLATE_PATH; ?>/images/logo--full.svg"
                             class="logo"
                             loading="lazy">
                    </a>

                <? } ?>

                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    ".default",
                    [
                        "AREA_FILE_SHOW"      => "sect",
                        "AREA_FILE_SUFFIX"    => "contact",
                        "EDIT_TEMPLATE"       => "",
                        "AREA_FILE_RECURSIVE" => "Y",

                        "COMPOSITE_FRAME_MODE" => "A",
                        "COMPOSITE_FRAME_TYPE" => "AUTO"
                    ],
                    false,
                    [
                        "HIDE_ICONS" => "Y",
                    ]
                ); ?>

            </div>

            <div id="page--footer--menu" class="two-fifths">

                <div class="column">

                    <? $APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "footer",
                        [
                            "TITLE" => "Наши продукты",

                            "ROOT_MENU_TYPE" => "catalog",

                            "DELAY"              => "N",
                            "ALLOW_MULTI_SELECT" => "N",

                            "MAX_LEVEL" => 2,

                            "MENU_CACHE_GET_VARS"   => [""],
                            "MENU_CACHE_TIME"       => CACHE_TTL,
                            "MENU_CACHE_TYPE"       => "A",
                            "MENU_CACHE_USE_GROUPS" => "N",

                            "USE_EXT" => "N",

                            "CACHE_SELECTED_ITEMS" => "Y",

                            "COMPOSITE_FRAME_MODE" => "A",
                            "COMPOSITE_FRAME_TYPE" => "AUTO"
                        ]
                    ); ?>

                    <? $APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "footer",
                        [
                            "TITLE" => "Полезные ссылки",

                            "ROOT_MENU_TYPE"  => "footer",
                            "CHILD_MENU_TYPE" => "local",

                            "DELAY"              => "N",
                            "ALLOW_MULTI_SELECT" => "N",

                            "MAX_LEVEL" => 2,

                            "MENU_CACHE_GET_VARS"   => [""],
                            "MENU_CACHE_TIME"       => CACHE_TTL,
                            "MENU_CACHE_TYPE"       => "A",
                            "MENU_CACHE_USE_GROUPS" => "N",

                            "USE_EXT" => "N",

                            "CACHE_SELECTED_ITEMS" => "Y",

                            "COMPOSITE_FRAME_MODE" => "A",
                            "COMPOSITE_FRAME_TYPE" => "AUTO"
                        ]
                    ); ?>

                    <? $APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "footer",
                        [
                            "TITLE" => "Правовая информация",

                            "ROOT_MENU_TYPE" => "law",

                            "DELAY"              => "N",
                            "ALLOW_MULTI_SELECT" => "N",

                            "MAX_LEVEL" => 2,

                            "MENU_CACHE_GET_VARS"   => [""],
                            "MENU_CACHE_TIME"       => CACHE_TTL,
                            "MENU_CACHE_TYPE"       => "A",
                            "MENU_CACHE_USE_GROUPS" => "N",

                            "USE_EXT" => "N",

                            "CACHE_SELECTED_ITEMS" => "Y",

                            "COMPOSITE_FRAME_MODE" => "A",
                            "COMPOSITE_FRAME_TYPE" => "AUTO",

                        ]
                    ); ?>

                </div>

            </div>

            <div id="page--footer--links" class="fifth">

                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    ".default",
                    [
                        "AREA_FILE_SHOW"      => "sect",
                        "AREA_FILE_SUFFIX"    => "links",
                        "EDIT_TEMPLATE"       => "",
                        "AREA_FILE_RECURSIVE" => "Y",

                        "COMPOSITE_FRAME_MODE" => "A",
                        "COMPOSITE_FRAME_TYPE" => "AUTO"
                    ]
                ); ?>

            </div>

        </div>

    </div>

    <div id="page--footer--outro" class="wrap">

        <div class="grid">

            <div class="half copyright">
                <span>© RICHE, 2015 – <?= Date('Y'); ?> гг.</span>
            </div>

            <div class="half requisites">
                <span>КПП 213001001</span>
                <span>ИНН 213016070</span>
            </div>

        </div>

    </div>

    <? $footerFrame->finishDynamicArea(); ?>

</footer>

<?php $APPLICATION->ShowBodyScripts(); ?>

</body>
</html>
