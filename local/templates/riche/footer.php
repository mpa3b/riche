<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Application;
use Riche\Template;

global $USER, $APPLICATION;

?>

    </div>

</div>

<? $APPLICATION->IncludeComponent(
    "bitrix:form",
    "",
    [
        "AGREEMENT_URL" => "/about/privacy-policy/",
        "AJAX_MODE" => "Y",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "CHAIN_ITEM_LINK" => "",
        "CHAIN_ITEM_TEXT" => "",
        "EDIT_ADDITIONAL" => "N",
        "EDIT_STATUS" => "N",
        "IGNORE_CUSTOM_TEMPLATE" => "N",
        "NOT_SHOW_FILTER" => ["", ""],
        "NOT_SHOW_TABLE" => ["", ""],
        "RESULT_ID" => $_REQUEST[RESULT_ID],
        "SEF_MODE" => "N",
        "SHOW_ADDITIONAL" => "N",
        "SHOW_ANSWER_VALUE" => "N",
        "SHOW_EDIT_PAGE" => "N",
        "SHOW_LIST_PAGE" => "N",
        "SHOW_STATUS" => "N",
        "SHOW_VIEW_PAGE" => "N",
        "START_PAGE" => "new",
        "SUCCESS_URL" => "",
        "USE_EXTENDED_ERRORS" => "N",
        "VARIABLE_ALIASES" => [
            "action" => "action"
        ],
        "WEB_FORM_ID" => "1"
    ]
); ?>

<div id="page--footer">

    <div id="page--footer--top" class="wrap">

        <div class="grid">

            <div id="page--footer--contact" class="two-fifths">

                <?php if (Application::getInstance()->getContext()->getRequest()->getRequestedPageDirectory() == "") { ?>

                    <img src="<?php echo SITE_TEMPLATE_PATH . '/images/logo--full.svg'; ?>"
                         class="logo"
                         loading="lazy">

                <?php } else { ?>

                    <a href="/">
                        <img src="<?php echo SITE_TEMPLATE_PATH . '/images/logo--full.svg'; ?>"
                             class="logo"
                             loading="lazy">
                    </a>

                <?php } ?>

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

            <div id="page--footer--menu" class="three-fifths">

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
                <span>© RICHE, 2015 – <?php echo Date('Y'); ?> гг.</span>
            </div>

            <div class="half text-align--right">
                <span>КПП 213001001</span>
                <span>ИНН 213016070</span>
            </div>

        </div>

    </div>

</div>

</body>
</html>