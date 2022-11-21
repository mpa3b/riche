<?

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
/** @var CBitrixComponent $component */

$this->setFrameMode(true);

if (!empty($arResult['SECTIONS'])) {

    $frame = $this->createFrame();

    ?>

    <nav class="section-list--catalog--default">

        <? $frame->begin(); ?>

        <div class="wrap">

            <ul class="row">

                <?php foreach ($arResult['SECTIONS'] as $i => $section) { ?>

                    <li>

                        <? if ($arParams['COUNT_ELEMENTS'] && $section['ELEMENT_CNT'] > 0) { ?>
                            <span class="count"
                                  title="<?= $section['ELEMENT_CNT_TITLE']; ?>"><?= $section['ELEMENT_CNT']; ?></span>
                        <? } ?>

                        <a href="<?= $section['SECTION_PAGE_URL']; ?>">
                            <? if (is_set($section['PICTURE']['ID'])) { ?>

                                <?

                                $preload = CFile::ResizeImageGet(
                                    $section['PICTURE']['ID'],
                                    Thumb::calculateImageSize(Breakpoint::breakpoints['preload'], 1),
                                    BX_RESIZE_IMAGE_EXACT
                                );

                                $small = CFile::ResizeImageGet(
                                    $section['PICTURE']['ID'],
                                    Thumb::calculateImageSize(Breakpoint::breakpoints['small'] / 2, 1),
                                    BX_RESIZE_IMAGE_EXACT
                                );

                                $mobile = CFile::ResizeImageGet(
                                    $section['PICTURE']['ID'],
                                    Thumb::calculateImageSize(Breakpoint::breakpoints['mobile'] / 3, 1),
                                    BX_RESIZE_IMAGE_EXACT
                                );

                                $tablet = CFile::ResizeImageGet(
                                    $section['PICTURE']['ID'],
                                    Thumb::calculateImageSize(Breakpoint::breakpoints['tablet'] / 4, 1),
                                    BX_RESIZE_IMAGE_EXACT
                                );

                                $desktop = CFile::ResizeImageGet(
                                    $section['PICTURE']['ID'],
                                    Thumb::calculateImageSize(Breakpoint::breakpoints['desktop'] / 6, 1),
                                    BX_RESIZE_IMAGE_EXACT
                                );

                                $wide = CFile::ResizeImageGet(
                                    $section['PICTURE']['ID'],
                                    Thumb::calculateImageSize(Breakpoint::breakpoints['wide'] / 6, 1),
                                    BX_RESIZE_IMAGE_EXACT
                                );

                                ?>

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

                                    <img
                                        <? if ($i == 0) { ?>
                                            loading="eager"
                                            src="<?= $preload['src']; ?>"
                                        <? } else { ?>
                                            loading="lazy"
                                            data-src="<?= $preload['src']; ?>"
                                        <? } ?>
                                            alt="<?= $section['NAME']; ?>">

                                </picture>

                            <? } ?>
                            <span class="name"><?= $section['NAME']; ?></span>
                        </a>

                        <? /*
                        <? if ($section['DESCRIPTION_TYPE'] == "html") { ?>
                            <?= $section['DESCRIPTION']; ?>
                        <? } else { ?>
                            <p><?= $section['DESCRIPTION']; ?></p>
                        <? } ?>
                        */ ?>

                    </li>

                <?php } ?>

            </ul>

        </div>

        <? $frame->end(); ?>

    </nav>

    <?php

}

d($arResult);
d($arParams);
