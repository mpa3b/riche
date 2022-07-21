<?php

if (!defined("B_PROLOG_INCLUDED") or B_PROLOG_INCLUDED !== true) die();

use Riche\Template;

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

$this->addExternalJs(Template::ASSETS . '/tiny-slider/dist/min/tiny-slider.js');
$this->addExternalCss(Template::ASSETS . '/tiny-slider/dist/tiny-slider.css');

$this->setFrameMode(true);

$frame = $this->createFrame();

?>

<?php if (!empty($arResult['ITEMS'])) { ?>

    <div class="header-line">

        <?php $frame->begin(); ?>

        <div class="slider items">

            <?php foreach ($arResult['ITEMS'] as $i => $arItem) { ?>

                <div><?php echo htmlspecialchars($arItem['PREVIEW_TEXT']); ?></div>

            <?php } ?>

        </div>

        <?php $frame->end(); ?>

    </div>

<?php } ?>
