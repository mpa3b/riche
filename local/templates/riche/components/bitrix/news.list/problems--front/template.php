<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

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

?>

<? if (!empty($arResult['ITEMS'])) { ?>

    <?php

    $this->addExternalJs(LOCAL_ASSETS . '/slick-carousel/slick/slick.js');
    $this->addExternalCss(LOCAL_ASSETS . '/slick-carousel/slick/slick.css');
    $this->addExternalCss(SITE_TEMPLATE_PATH . '/styles/slick.css');

    $frame = $this->createFrame();

    ?>

    <section class="problems--front wrap">

        <? $frame->begin(); ?>

        <h2>Что тебя волнует?</h2>

        <p>У нас есть опыт и мы можем помочь.</p>

        <div class="items slider">

            <? foreach ($arResult['ITEMS'] as $i => $arItem) { ?>

                <div class="item">

                    <? if ($arItem['DETAIL_PICTURE']) { ?>

                        <?

                        $preload = CFile::ResizeImageGet(
                            $arItem['DETAIL_PICTURE']['ID'],
                            Thumb::calculateImageSize(Breakpoint::breakpoints['preload'], 0.75),
                            BX_RESIZE_IMAGE_EXACT
                        );

                        $small = CFile::ResizeImageGet(
                            $arItem['DETAIL_PICTURE']['ID'],
                            Thumb::calculateImageSize(Breakpoint::breakpoints['small'] / 2, 0.75),
                            BX_RESIZE_IMAGE_EXACT
                        );

                        $mobile = CFile::ResizeImageGet(
                            $arItem['DETAIL_PICTURE']['ID'],
                            Thumb::calculateImageSize(Breakpoint::breakpoints['mobile'] / 2, 0.75),
                            BX_RESIZE_IMAGE_EXACT
                        );

                        $tablet = CFile::ResizeImageGet(
                            $arItem['DETAIL_PICTURE']['ID'],
                            Thumb::calculateImageSize(Breakpoint::breakpoints['tablet'] / 3, 1.25),
                            BX_RESIZE_IMAGE_EXACT
                        );

                        $desktop = CFile::ResizeImageGet(
                            $arItem['DETAIL_PICTURE']['ID'],
                            Thumb::calculateImageSize(Breakpoint::breakpoints['desktop'] / 4, 1.25),
                            BX_RESIZE_IMAGE_EXACT
                        );

                        $wide = CFile::ResizeImageGet(
                            $arItem['DETAIL_PICTURE']['ID'],
                            Thumb::calculateImageSize(Breakpoint::breakpoints['wide'] / 5, 1.25),
                            BX_RESIZE_IMAGE_EXACT
                        );

                        ?>

                        <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>">

                            <picture>

                                <? if ($i == 0) { ?>

                                    <source srcset="<?= $small['src']; ?>"
                                            media="<?= Breakpoint::getMedia('small'); ?>">
                                    <source srcset="<?= $mobile['src']; ?>"
                                            media="<?= Breakpoint::getMedia('mobile'); ?>">
                                    <source srcset="<?= $tablet['src']; ?>"
                                            media="<?= Breakpoint::getMedia('tablet'); ?>">
                                    <source srcset="<?= $desktop['src']; ?>"
                                            media="<?= Breakpoint::getMedia('desktop'); ?>">
                                    <source srcset="<?= $wide['src']; ?>"
                                            media="<?= Breakpoint::getMedia('wide'); ?>">

                                    <img alt="<?= $arItem['NAME']; ?>"
                                         src="<?= $preload['src']; ?>"
                                         loading="lazy">

                                <? } else { ?>

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

                                    <img alt="<?= $arItem['NAME']; ?>"
                                         data-src="<?= $preload['src']; ?>"
                                         loading="lazy">

                                <? } ?>


                            </picture>

                        </a>

                    <? } ?>

                    <h3><?= $arItem['NAME']; ?></h3>

                </div>

            <?php } ?>

        </div>

        <? $frame->end(); ?>

    </section>

<? } ?>
