<?php

use Riche\Breakpoint;
use Riche\Thumb;

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

$this->setFrameMode(true);

$this->addExternalJs(LOCAL_ASSETS . '/slick-carousel/slick/slick.js');
$this->addExternalCss(LOCAL_ASSETS . '/slick-carousel/slick/slick.css');
$this->addExternalCss(SITE_TEMPLATE_PATH . '/styles/slick.css');

$frame = $this->createFrame();

?>

<? if (!empty($arResult['ITEMS'])) { ?>

    <section class="reviews--front">

        <? $frame->begin(); ?>

        <div class="wrap">

            <h2>Наши покупатели</h2>

            <div class="items slider">

                <? foreach ($arResult['ITEMS'] as $arItem) { ?>

                    <div class="item">

                        <span class="date"><?= $arItem['DISPLAY_ACTIVE_FROM']; ?></span>

                        <div class="author">

                            <?


                            $mobile = CFile::ResizeImageGet(
                                $arItem['DETAIL_PICTURE']['ID'],
                                Thumb::calculateImageSize(100, 1),
                                BX_RESIZE_IMAGE_EXACT
                            );


                            $desktop = CFile::ResizeImageGet(
                                $arItem['DETAIL_PICTURE']['ID'],
                                Thumb::calculateImageSize(120, 1),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            ?>

                            <picture class="picture">

                                <source data-srcset="<?= $desktop['src']; ?>"
                                        media="<?= Breakpoint::getMedia('desktop'); ?>">

                                <img data-src="<?= $mobile['src']; ?>"
                                     alt="<?= $arItem['DISPLAY_PROPERTIES']['AUTHOR_NAME']['VALUE']; ?>"
                                     loading="lazy">

                            </picture>

                            <span class="name">
                                <?= $arItem['DISPLAY_PROPERTIES']['AUTHOR_NAME']['VALUE']; ?>
                            </span>

                        </div>

                        <div class="review">
                            <?= trim($arItem['DETAIL_TEXT']); ?>
                        </div>

                        <? if ($arItem['DISPLAY_PROPERTIES']['RATING']) { ?>
                            <div class="rating field"
                                 data-rating="<?= $arItem['DISPLAY_PROPERTIES']['RATING']['VALUE']; ?>">
                                <i class="star"></i>
                            </div>
                        <? } ?>

                    </div>

                <?php } ?>

            </div>

        </div>

        <? $frame->end(); ?>

    </section>

<? } ?>

<? d($arResult); ?>
