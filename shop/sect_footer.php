<?php

/** @global CMain $APPLICATION */

?>

<div class="row">

    <div class="half quiz">

        <?php $APPLICATION->IncludeComponent(
            'bitrix:form',
            'quiz--front',
            [
                "WEB_FORM_ID" => 1,
                "RESULT_ID"   => $_REQUEST["RESULT_ID"],

                "START_PAGE"  => "new",
                "SUCCESS_URL" => "?success",

                "SHOW_LIST_PAGE"    => "N",
                "SHOW_EDIT_PAGE"    => "N",
                "SHOW_VIEW_PAGE"    => "N",
                "SHOW_ANSWER_VALUE" => "Y",
                "SHOW_ADDITIONAL"   => "Y",
                "SHOW_STATUS"       => "N",

                "EDIT_ADDITIONAL" => "N",
                "EDIT_STATUS"     => "N",

                "NOT_SHOW_FILTER" => [],
                "NOT_SHOW_TABLE"  => [],

                "CHAIN_ITEM_TEXT" => "",
                "CHAIN_ITEM_LINK" => "",

                "IGNORE_CUSTOM_TEMPLATE" => "Y",
                "USE_EXTENDED_ERRORS"    => "N",

                "CACHE_TYPE" => "A",
                "CACHE_TIME" => CACHE_TTL,

                "SEF_MODE"          => "Y",
                "SEF_FOLDER"        => "/",
                "SEF_URL_TEMPLATES" => [
                    "new" => "/"
                ],

                "AJAX_MODE"           => "N",
                "AJAX_OPTION_JUMP"    => "N",
                "AJAX_OPTION_STYLE"   => "Y",
                "AJAX_OPTION_HISTORY" => "N",

                "VARIABLE_ALIASES" => [
                    "new"  => [],
                    "list" => [],
                    "edit" => [],
                    "view" => [],
                ],

                "COMPOSITE_FRAME_MODE" => "A",
                "COMPOSITE_FRAME_TYPE" => "AUTO"

            ]
        ); ?>

    </div>

    <div class="half subscribe">

        <?php $APPLICATION->IncludeComponent(
            "bitrix:sender.subscribe",
            "subscribe--front",
            [
                "USE_PERSONALIZATION" => "Y",
                "CONFIRMATION"        => "Y",
                "SHOW_HIDDEN"         => "N",
                "HIDE_MAILINGS"       => "N",

                "CACHE_TYPE" => "A",
                "CACHE_TIME" => CACHE_TTL,

                "AJAX_MODE"           => "N",
                "AJAX_OPTION_JUMP"    => "N",
                "AJAX_OPTION_STYLE"   => "Y",
                "AJAX_OPTION_HISTORY" => "N",

                "SET_TITLE" => "N",

                "COMPOSITE_FRAME_MODE" => "A",
                "COMPOSITE_FRAME_TYPE" => "AUTO"
            ]
        ); ?>

    </div>

</div>
