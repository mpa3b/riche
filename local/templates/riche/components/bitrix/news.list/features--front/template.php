<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Riche\Breakpoint;
use Riche\Thumb;

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

$this->setFrameMode(true);

$frame = $this->createFrame();

?>

<?php if (!empty($arResult['ITEMS'])) { ?>

    <div class="features--front wrap">

        <? $frame->begin(); ?>

        <h2 hidden>RICHE COSMETICS</h2>

        <div class="accordion items">

            <? foreach ($arResult['ITEMS'] as $arItem) { ?>

                <li class="item">

                    <div class="picture">

                        <? if ($arItem['DISPLAY_PROPERTIES']['VIDEO']) { ?>

                            <video muted loop autoplay>

                                <source data-src="<?= $arItem['DISPLAY_PROPERTIES']['VIDEO']['VALUE']['path']; ?>">

                            </video>

                        <? } ?>

                        <? if ($arItem['DETAIL_PICTURE']) { ?>

                            <picture>

                                <? foreach (Breakpoint::breakpoints as $media => $width) { ?>

                                    <?

                                    $image = CFile::ResizeImageGet(
                                        $arItem['DETAIL_PICTURE']['ID'],
                                        Thumb::calculateImageSize($width),
                                        BX_RESIZE_IMAGE_PROPORTIONAL
                                    );

                                    ?>

                                    <source data-srcset="<?= $image['src']; ?>"
                                            media="<?= Breakpoint::getMedia($media); ?>">

                                <? } ?>

                                <img src="<?= Thumb::PLACEHOLDER; ?>" alt="<?= $arItem['NAME']; ?>">

                            </picture>

                        <? } ?>

                    </div>

                    <h3><?= $arItem['NAME']; ?></h3>

                    <? if (!empty($arItem['PREVIEW_TEXT'])) { ?>
                        <p><?= $arItem['PREVIEW_TEXT']; ?></p>
                    <? } ?>

                </li>

            <? } ?>

        </div>

        <? $frame->end(); ?>

    </div>

<?php } ?>
