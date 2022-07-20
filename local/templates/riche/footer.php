<?php use Riche\Template;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

global $USER, $APPLICATION;
?>

</div>

<div id="page--footer">

    <div class="wrap">

        <div class="row">

            <div id="page--footer--contact">

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

            <div id="page--footer--menu">

                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "footer",
                    [
                        "ALLOW_MULTI_SELECT"    => "N",
                        "CHILD_MENU_TYPE"       => "local",
                        "DELAY"                 => "N",
                        "MAX_LEVEL"             => 2,
                        "MENU_CACHE_GET_VARS"   => [""],
                        "MENU_CACHE_TIME"       => Template::CACHE_TIME,
                        "MENU_CACHE_TYPE"       => "A",
                        "MENU_CACHE_USE_GROUPS" => "N",
                        "ROOT_MENU_TYPE"        => "footer",
                        "USE_EXT"               => "N",
                        "CACHE_SELECTED_ITEMS"  => "N",

                        "COMPOSITE_FRAME_MODE" => "A",
                        "COMPOSITE_FRAME_TYPE" => "AUTO"
                    ]
                ); ?>

            </div>

            <div id="page--footer--about">

                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    ".default",
                    [
                        "AREA_FILE_SHOW"      => "sect",
                        "AREA_FILE_SUFFIX"    => "about",
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

        <div class="row">

            <div id="page--footer--outro">

                <span>RICHE</span>

            </div>

        </div>

    </div>

</div>

<noindex>
    <?php $APPLICATION->ShowCSS(true, false); // Output css site styles ?>
</noindex>

</body>
</html>