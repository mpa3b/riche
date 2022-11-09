<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
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

if ($arParams["SHOW_RESULTS"] == "Y") {
    $this->IncludeLangFile("result.php");
}

?>

<? $APPLICATION->IncludeComponent(
    "bitrix:voting.result",
    ".default",
    [
        "VOTE_ID"             => $arResult["VOTE_ID"],
        "CACHE_TIME"          => $arParams["CACHE_TIME"],
        "PERMISSION"          => $arParams["PERMISSION"],
        "ADDITIONAL_CACHE_ID" => $arResult["ADDITIONAL_CACHE_ID"],
        "CACHE_TYPE"          => $arParams["CACHE_TYPE"],
        "VOTE_ALL_RESULTS"    => $arParams["VOTE_ALL_RESULTS"],
        "CAN_VOTE"            => $arParams["CAN_VOTE"]
    ],
    ($this->__component->__parent ? $this->__component->__parent : $component),
    ["HIDE_ICONS" => "Y"]
); ?>

<? if ($arParams["SHOW_RESULTS"] = "Y" && $arParams["CAN_VOTE"] == "Y"): ?>

    <a href="<?= $APPLICATION->GetCurPageParam(
        "",
        [
            "VOTE_ID",
            "VOTING_OK",
            "VOTE_SUCCESSFULL",
            "view_result"
        ]
    ) ?>">
        <?= GetMessage("VOTE_BACK") ?>
    </a>

<? endif; ?>
