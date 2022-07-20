<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

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

if ($arResult["FILE"] <> '') { ?>

    <div class="include-area <?= $arParams['AREA_FILE_SUFFIX']; ?>"
         data-area-name="<?= $arParams['AREA_FILE_SUFFIX']; ?>">

        <?php $frame->begin(); ?>

        <?php include($arResult["FILE"]); ?>

        <?php $frame->end(); ?>

    </div>

<? }

