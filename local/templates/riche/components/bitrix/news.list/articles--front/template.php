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

$this->addExternalJs(LOCAL_ASSETS . '/slick-carousel/slick/slick.js');
$this->addExternalCss(LOCAL_ASSETS . '/slick-carousel/slick/slick.css');
$this->addExternalCss(SITE_TEMPLATE_PATH . '/styles/slick.css');

$frame = $this->createFrame();

?>

<? if (!empty($arResult['ITEMS'])) { ?>

    <section class="articles--front">

        <? $frame->begin(); ?>

        <div class="wrap">

            <h2>Полезные статьи</h2>

            <div class="items slider">

                <? foreach ($arResult['ITEMS'] as $arItem) { ?>

                    <div class="item">

                        <? if ($arItem['DETAIL_PICTURE']) { ?>

                            <?

                            $preload = CFile::ResizeImageGet(
                                $arItem['DETAIL_PICTURE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['preload'], 1),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $small = CFile::ResizeImageGet(
                                $arItem['DETAIL_PICTURE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['small'] / 2, 1),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $mobile = CFile::ResizeImageGet(
                                $arItem['DETAIL_PICTURE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['mobile'] / 2, 1),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $tablet = CFile::ResizeImageGet(
                                $arItem['DETAIL_PICTURE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['tablet'] / 3, 1),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $desktop = CFile::ResizeImageGet(
                                $arItem['DETAIL_PICTURE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['desktop'] / 4, 1.5),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $wide = CFile::ResizeImageGet(
                                $arItem['DETAIL_PICTURE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['wide'] / 5, 1.5),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            ?>

                            <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>">

                                <picture>

                                    <source data-srcset="<?= $small['src']; ?>"
                                            media="<?= Breakpoint::getMedia('small'); ?>">
                                    <source data-srcset="<?= $mobile['src']; ?>"
                                            media="<?= Breakpoint::getMedia('mobile'); ?>">
                                    <source data-srcset="<?= $tablet['src']; ?>"
                                            media="<?= Breakpoint::getMedia('tablet'); ?>">
                                    <source data-srcset="<?= $desktop['src']; ?>"
                                            media="<?= Breakpoint::getMedia('desktop'); ?>">
                                    <source data-srcset="<?= $wide['src']; ?>"
                                            media="<?= Breakpoint::getMedia('wide'); ?>">

                                    <img data-src="<?= $preload['src']; ?>"
                                         alt="<?= $arItem['NAME']; ?>"
                                         loading="lazy">

                                </picture>

                            </a>

                        <? } ?>

                        <span class="date"><?= $arItem['DISPLAY_ACTIVE_FROM']; ?></span>

                        <h3><?= $arItem['NAME']; ?></h3>

                        <p class="hide--on-mobiles"><?= $arItem['PREVIEW_TEXT']; ?></p>

                    </div>

                <?php } ?>

            </div>

        </div>

        <? $frame->end(); ?>

    </section>

<? } ?>