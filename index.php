<?

    require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

    global $APPLICATION, $USER;

    use Bitrix\Main\Application;
    use Riche\Template;

    $APPLICATION->SetTitle("Про красоту и здоровье");

    $APPLICATION->SetPageProperty("keywords", "RICHE, здоровье, красота, уход");
    $APPLICATION->SetPageProperty("description", "RICHE — это про красоту и здоровье");

?>

<? $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'banners--front--static',
    [
        'IBLOCK_TYPE'               => 'CONTENT',
        'IBLOCK_ID'                 => 17,
        'NEWS_COUNT'                => 3,
        'SORT_BY1'                  => 'ACTIVE_FROM',
        'SORT_ORDER1'               => 'DESC ',
        'CHECK_DATES'               => 'Y',
        'SET_TITLE'                 => 'N',
        'SET_BROWSER_TITLE'         => 'N',
        'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
        'ADD_SECTIONS_CHAIN'        => 'N',

        'FIELD_CODE'    => [
            'DETAIL_PICTURE',
            'PREVIEW_PICTURE'
        ],
        'PROPERTY_CODE' => [
            'HERO_IMAGE', 'BACKGROUND_IMAGE',
            'BUTTON_TEXT', 'BUTTON_LINK',
        ],

        'CACHE_TYPE' => 'A',
        'CACHE_TIME' => Template::CACHE_TIME,

        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO"
    ]
); ?>

<? $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'brand--front--slider',
    [
        'IBLOCK_TYPE'               => 'CONTENT',
        'IBLOCK_ID'                 => 21,
        'NEWS_COUNT'                => 6,
        'SORT_BY1'                  => 'ACTIVE_FROM',
        'SORT_ORDER1'               => 'DESC ',
        'CHECK_DATES'               => 'Y',
        'SET_TITLE'                 => 'N',
        'SET_BROWSER_TITLE'         => 'N',
        'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
        'ADD_SECTIONS_CHAIN'        => 'N',

        'FIELD_CODE' => [
            'DETAIL_PICTURE',
            'PREVIEW_PICTURE'
        ],

        'DISPLAY_PICTURE' => 'Y',

        'CACHE_TYPE' => 'A',
        'CACHE_TIME' => Template::CACHE_TIME,

        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO"
    ]
); ?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'features--front--slider',
    [
        'IBLOCK_TYPE'               => 'CONTENT',
        'IBLOCK_ID'                 => 16,
        'NEWS_COUNT'                => 6,
        'SORT_BY1'                  => 'ACTIVE_FROM',
        'SORT_ORDER1'               => 'DESC ',
        'CHECK_DATES'               => 'Y',
        'SET_TITLE'                 => 'N',
        'SET_BROWSER_TITLE'         => 'N',
        'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
        'ADD_SECTIONS_CHAIN'        => 'N',

        'FIELD_CODE' => [
            'DETAIL_PICTURE',
            'PREVIEW_PICTURE'
        ],

        'DISPLAY_PICTURE' => 'Y',

        'CACHE_TYPE' => 'A',
        'CACHE_TIME' => Template::CACHE_TIME,

        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO"
    ]
); ?>

<? $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'reviews--front',
    [
        'IBLOCK_TYPE' => 'CONTENT',
        'IBLOCK_ID'   => 14,
        'NEWS_COUNT'  => 9,
        'SORT_BY1'    => 'ACTIVE_FROM',
        'SORT_ORDER1' => 'DESC ',
        'CHECK_DATES' => 'Y',

        'ACTIVE_DATE_FORMAT' => 'j F',

        'RATING_MAX' => 5,
        'TEXT_LIMIT' => 300,

        'PROPERTY_CODE' => [
            'AUTHOR_IMAGE', 'AUTHOR_TITLE', 'AUTHOR_NAME', 'AUTHOR_NAME', 'DATE', 'SKU', 'RATING', 'SKU'
        ],

        'SET_TITLE'                 => 'N',
        'SET_BROWSER_TITLE'         => 'N',
        'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
        'ADD_SECTIONS_CHAIN'        => 'N',

        'CACHE_TYPE' => 'A',
        'CACHE_TIME' => Template::CACHE_TIME,

        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO"
    ]
); ?>

<? $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'videos--front',
    [
        'IBLOCK_TYPE' => 'CONTENT',
        'IBLOCK_ID'   => 22,
        'NEWS_COUNT'  => 5,
        'SORT_BY1'    => 'ACTIVE_FROM',
        'SORT_ORDER1' => 'DESC ',
        'CHECK_DATES' => 'Y',

        'ACTIVE_DATE_FORMAT' => 'j F',

        'FIELD_CODE' => [
            'PREVIEW_PICTURE', 'DETAIL_PICTURE'
        ],

        'PROPERTY_CODE' => [
            'VIDEO', 'SKU'
        ],

        'SET_TITLE'                 => 'N',
        'SET_BROWSER_TITLE'         => 'N',
        'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
        'ADD_SECTIONS_CHAIN'        => 'N',

        'CACHE_TYPE' => 'A',
        'CACHE_TIME' => Template::CACHE_TIME,

        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO"
    ]
); ?>

<div class="wrap">

    <div class="row">

        <div class="half">

            <? $request = Application::getInstance()->getContext()->getRequest(); ?>

            <? $APPLICATION->IncludeComponent(
                'bitrix:form',
                'quiz--front',
                [
                    "AJAX_MODE"   => "N",
                    "SEF_MODE"    => "Y",
                    "WEB_FORM_ID" => 1,

                    "RESULT_ID" => $request->get("RESULT_ID"),

                    "START_PAGE" => "new",

                    "SHOW_LIST_PAGE"    => "Y",
                    "SHOW_EDIT_PAGE"    => "Y",
                    "SHOW_VIEW_PAGE"    => "Y",
                    "SUCCESS_URL"       => "",
                    "SHOW_ANSWER_VALUE" => "N",
                    "SHOW_ADDITIONAL"   => "N",
                    "SHOW_STATUS"       => "N",

                    "EDIT_ADDITIONAL" => "N",
                    "EDIT_STATUS"     => "N",

                    "NOT_SHOW_FILTER" => [],
                    "NOT_SHOW_TABLE"  => [],

                    "CHAIN_ITEM_TEXT" => "",
                    "CHAIN_ITEM_LINK" => "",

                    "IGNORE_CUSTOM_TEMPLATE" => "N",

                    "USE_EXTENDED_ERRORS" => "N",

                    "CACHE_TYPE"          => "A",
                    "CACHE_TIME"          => Template::CACHE_TIME,
                    "AJAX_OPTION_JUMP"    => "N",
                    "AJAX_OPTION_STYLE"   => "Y",
                    "AJAX_OPTION_HISTORY" => "N",

                    "SEF_FOLDER"        => "/",
                    "SEF_URL_TEMPLATES" => [
                        "new"  => "#WEB_FORM_ID#/",
                        "list" => "#WEB_FORM_ID#/list/",
                        "edit" => "#WEB_FORM_ID#/edit/#RESULT_ID#/",
                        "view" => "#WEB_FORM_ID#/view/#RESULT_ID#/"
                    ],

                    "VARIABLE_ALIASES" => [
                        "new"  => [],
                        "list" => [],
                        "edit" => [],
                        "view" => [],
                    ]
                ]
            ); ?>

        </div>

    </div>

</div>

<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>
