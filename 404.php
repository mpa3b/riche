<?

include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/urlrewrite.php');

/** @global CMain $APPLICATION */

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404", "Y");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");

$APPLICATION->IncludeComponent(
    "bitrix:main.map",
    ".default",
    [
        "LEVEL"            => 2,
        "COL_NUM"          => 2,
        "SHOW_DESCRIPTION" => "Y",
        "SET_TITLE"        => "Y",
        "CACHE_TIME"       => CACHE_TTL
    ]
);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");

?>
