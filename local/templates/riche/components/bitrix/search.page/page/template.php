<? use AkBars\Images;

if (!defined("B_PROLOG_INCLUDED") or B_PROLOG_INCLUDED !== true) {
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
/** @var CBitrixComponent $component */

$this->setFrameMode(true);

$frame = $this->createFrame();

?>

<div class="search-page--page">

    <? $frame->begin(); ?>

    <div class="wrap">

        <form>

            <div class="form">

                <? if ($arParams["USE_SUGGEST"] === "Y") { ?>

                    <?

                    if (mb_strlen($arResult["REQUEST"]["~QUERY"]) and is_object($arResult["NAV_RESULT"])) {

                        $arResult["FILTER_MD5"] = $arResult["NAV_RESULT"]->GetFilterMD5();
                        $obSearchSuggest        =
                            new CSearchSuggest($arResult["FILTER_MD5"], $arResult["REQUEST"]["~QUERY"]);
                        $obSearchSuggest->SetResultCount($arResult["NAV_RESULT"]->NavRecordCount);

                    }

                    ?>

                    <? $APPLICATION->IncludeComponent(
                        "bitrix:search.suggest.input",
                        "",
                        [
                            "NAME"          => "q",
                            "VALUE"         => $arResult["REQUEST"]["~QUERY"],
                            "INPUT_SIZE"    => 40,
                            "DROPDOWN_SIZE" => 10,
                            "FILTER_MD5"    => $arResult["FILTER_MD5"],
                        ],
                        $component,
                        ["HIDE_ICONS" => "Y"]
                    ); ?>

                <? } else { ?>

                    <input type="search"
                           name="q"
                           value="<?= $arResult["REQUEST"]["QUERY"]; ?>"
                           placeholder="Поиск"/>

                <? } ?>

                <input type="hidden" name="how" value="<?= $arResult["REQUEST"]["HOW"] == "d" ? "d" : "r" ?>"/>

                <button class="transparent search button" type="submit">
                    <i class="icon search"></i>
                </button>

            </div>

        </form>

    </div>

    <? $frame->end(); ?>

</div>
