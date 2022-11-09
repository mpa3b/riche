<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Application;
use Riche\Template;

global $USER, $APPLICATION;

$currentDirectoryPath = Application ::getInstance() -> getContext() -> getRequest() -> getRequestedPageDirectory();

?>

    </div>

</main>

<footer id="page--footer">

    <div id="page--footer--top" class="wrap">

        <div class="grid">

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

                <? $APPLICATION -> IncludeComponent(
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

            <div id="page--footer--menu" class="three-fifths">

                <? $APPLICATION -> IncludeComponent(
                    "bitrix:menu",
                    "footer",
                    [
                        "ALLOW_MULTI_SELECT"    => "N",
                        "CHILD_MENU_TYPE"       => "local",
                        "DELAY"                 => "N",
                        "MAX_LEVEL"             => 2,
                        "MENU_CACHE_GET_VARS"   => [""],
                        "MENU_CACHE_TIME"       => CACHE_TTL,
                        "MENU_CACHE_TYPE"       => "A",
                        "MENU_CACHE_USE_GROUPS" => "N",
                        "ROOT_MENU_TYPE"        => "footer",
                        "USE_EXT"               => "N",
                        "CACHE_SELECTED_ITEMS"  => "N",

                        "COMPOSITE_FRAME_MODE" => "A",
                        "COMPOSITE_FRAME_TYPE" => "AUTO"
                    ]
                ); ?>

                <? $APPLICATION -> IncludeComponent(
                    "bitrix:main.include",
                    ".default",
                    [
                        "AREA_FILE_SHOW"      => "sect",
                        "AREA_FILE_SUFFIX"    => "links",
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

        </div>

    </div>

    <div id="page--footer--outro" class="wrap">

        <div class="row">

            <div class="half">
                <span>© RICHE, 2015 – <?= Date('Y'); ?> гг.</span>
            </div>

            <div class="half text-align--right">
                <span>КПП 213001001</span>
                <span>ИНН 213016070</span>
            </div>

        </div>

    </div>

</footer>

<?php $APPLICATION -> ShowBodyScripts(); ?>

</body>
</html>
