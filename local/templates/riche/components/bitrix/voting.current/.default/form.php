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

$id = "voting_current_" . rand(100, 10000);

if ($arParams["SHOW_RESULTS"] == "Y") {
    $this->IncludeLangFile("form.php");
    ob_start();
}
?>

<? $APPLICATION->IncludeComponent(
    "bitrix:voting.form",
    ".default",
    [
        "VOTE_ID"              => $arResult["VOTE_ID"],
        "VOTE_ASK_CAPTCHA"     => $arParams["VOTE_ASK_CAPTCHA"],
        "PERMISSION"           => $arParams["PERMISSION"],
        "VOTE_RESULT_TEMPLATE" => $arResult["VOTE_RESULT_TEMPLATE"],
        "ADDITIONAL_CACHE_ID"  => $arResult["ADDITIONAL_CACHE_ID"],
        "CACHE_TIME"           => $arParams["CACHE_TIME"],
        "CACHE_TYPE"           => $arParams["CACHE_TYPE"],
    ],
    ($this->__component->__parent ? $this->__component->__parent : $component)
); ?>

<? if ($arParams["SHOW_RESULTS"] == "Y") { ?>

    <? $sForm = ob_get_clean(); ?>

    <?= preg_replace(
        "/(\<a name\=\"show_result\" )/",
        "$1 onclick=\"BX('" . $id . "_form').style.display='none';BX('" . $id . "_result').style.display='block';return false;\" ",
        $sForm); ?>

    <? $APPLICATION->IncludeComponent(
        "bitrix:voting.result", ".default",
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

    <? if ($arParams["CAN_VOTE"] == "Y"): ?>

        <a href="<?= $APPLICATION->GetCurPageParam(
            "",
            [
                "VOTE_ID",
                "VOTING_OK",
                "VOTE_SUCCESSFULL",
                "view_result"
            ]) ?>">
            <?= GetMessage("VOTE_BACK") ?>
        </a>

    <? endif; ?>

<? } ?>
