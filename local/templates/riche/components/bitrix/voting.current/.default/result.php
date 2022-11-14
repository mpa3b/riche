<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var array $templateData */
/** @var CBitrixComponent $component */

?>

<? $APPLICATION->IncludeComponent(
    "bitrix:voting.result",
    "",
    [
        "VOTE_ID"             => $arResult["VOTE_ID"],
        "PERMISSION"          => $arParams["PERMISSION"],
        "CACHE_TIME"          => $arParams["CACHE_TIME"],
        "CACHE_TYPE"          => $arParams["CACHE_TYPE"],
        "ADDITIONAL_CACHE_ID" => $arResult["ADDITIONAL_CACHE_ID"],
        "VOTE_ALL_RESULTS"    => $arParams["VOTE_ALL_RESULTS"],
    ],
    $component
);
?>
