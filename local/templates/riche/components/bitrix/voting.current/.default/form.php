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
    "bitrix:voting.form",
    "",
    [
        "VOTE_ID"              => $arResult["VOTE_ID"],
        "VOTE_RESULT_TEMPLATE" => $arResult["VOTE_RESULT_TEMPLATE"],
        "PERMISSION"           => $arParams["PERMISSION"],
        "ADDITIONAL_CACHE_ID"  => $arResult["ADDITIONAL_CACHE_ID"],
        "CACHE_TIME"           => $arParams["CACHE_TIME"],
        "CACHE_TYPE"           => $arParams["CACHE_TYPE"],
    ],
    $component
);
?>
