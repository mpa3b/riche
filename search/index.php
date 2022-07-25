<?

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

global $USER, $APPLICATION;

use Riche\Template;

$APPLICATION->SetTitle("Поиск");

?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:search.page',
    [
        "TAGS_SORT"          => "NAME",
        "TAGS_PAGE_ELEMENTS" => 150,
        "TAGS_PERIOD"        => 30,
        "TAGS_URL_SEARCH"    => "/search/index.php",
        "TAGS_INHERIT"       => "Y",

        "PERIOD_NEW_TAGS" => "",
        "SHOW_CHAIN"      => "Y",
        "COLOR_TYPE"      => "Y",

        "USE_SUGGEST"          => "Y",
        "SHOW_RATING"          => "Y",
        "PATH_TO_USER_PROFILE" => "",

        "AJAX_MODE" => "N",
        "RESTART"   => "Y",

        "NO_WORD_LOGIC"      => "N",
        "USE_LANGUAGE_GUESS" => "Y",
        "CHECK_DATES"        => "Y",
        "USE_TITLE_RANK"     => "Y",
        "DEFAULT_SORT"       => "rank",

        "FILTER_NAME"       => "",
        "arrFILTER"         => ["no"],
        "SHOW_WHERE"        => "Y",
        "arrWHERE"          => [],
        "SHOW_WHEN"         => "Y",
        "PAGE_RESULT_COUNT" => "12",

        "CACHE_TYPE" => "A",
        "CACHE_TIME" => Template::CACHE_TIME,

        "DISPLAY_TOP_PAGER"    => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",

        "PAGER_TITLE"          => "Результаты поиска",
        "PAGER_SHOW_ALWAYS"    => "Y",
        "PAGER_TEMPLATE"       => "",

        "AJAX_OPTION_SHADOW"     => "Y",
        "AJAX_OPTION_JUMP"       => "N",
        "AJAX_OPTION_STYLE"      => "Y",
        "AJAX_OPTION_HISTORY"    => "N",
        "AJAX_OPTION_ADDITIONAL" => "",

        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO"
    ]
); ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>