<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemeplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

$this->setFrameMode(true);

$frame = $this->createFrame();

?>
<nav class="menu--header">

    <button class="transparent button hide--on-desktop trigger burger">
        <i class="icon burger"></i>
    </button>

    <div class="wrapper">

        <?php $frame->begin(); ?>

        <button class="transparent trigger button hide--on-desktop close">
            <i class="icon close-simple"></i>
        </button>

        <ul class="menu root">

            <?php foreach ($arResult as $arItem): ?>
                <li>
                    <a href="<?= $arItem['LINK']; ?>"><?= $arItem['TEXT']; ?></a>
                </li>
            <?php endforeach; ?>

        </ul>

        <?php $frame->end(); ?>

        <div class="on-mobile--only">

            <? $APPLICATION->IncludeComponent(
                'bitrix:main.include',
                '',
                [
                    "AREA_FILE_SHOW"      => "sect",
                    "AREA_FILE_SUFFIX"    => "contact",
                    "AREA_FILE_RECURSIVE" => "N",

                    "COMPOSITE_FRAME_MODE" => "A",
                    "COMPOSITE_FRAME_TYPE" => "AUTO",
                ],
                false
            ); ?>

        </div>

    </div>


</nav>