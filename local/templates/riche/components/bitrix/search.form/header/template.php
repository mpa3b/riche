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

    <button class="transparent button">
        <i class="icon search"></i>
    </button>

    <div class="dropdown">

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

    </div>

    <? $frame->end(); ?>

</div>