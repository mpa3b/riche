<?php if (!defined("B_PROLOG_INCLUDED") or B_PROLOG_INCLUDED !== true) die();

/** @var array $arParams */
/** @var array $arResult */
/** @global \CMain $APPLICATION */
/** @global \CUser $USER */
/** @global \CDatabase $DB */
/** @var \CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var array $templateData */
/** @var \CBitrixComponent $component */

$this->setFrameMode(true);

$frame = $this->createFrame();

?>

<div id="search-form--header">

    <? $frame->begin(); ?>

    <form action="/search/">

        <div class="input">

            <div class="field">

                <? if ($arParams["USE_SUGGEST"] === "Y") { ?>

                    <? $APPLICATION->IncludeComponent(
                        "bitrix:search.suggest.input",
                        "",
                        [
                            "NAME"          => "q",
                            "VALUE"         => "",
                            "INPUT_SIZE"    => 15,
                            "DROPDOWN_SIZE" => 10,
                        ],
                        $component, ["HIDE_ICONS" => "Y"]
                    ); ?>

                <? } else { ?>

                    <input type="search"
                           name="q"
                           value="<?= $arResult["REQUEST"]["QUERY"]; ?>"
                           placeholder="Поиск"/>

                <? } ?>

            </div>

        </div>

    </form>

    <div class="result">

        <div class="result--content hidden"></div>

    </div>

    <div class="no-result hidden">

        <div class="wrap">
            <p>К сожалению мы не нашли ничего по вашему запросу. Попробуйте начать поиск заново.</p>
        </div>

    </div>

    <? $frame->end(); ?>

</div>
