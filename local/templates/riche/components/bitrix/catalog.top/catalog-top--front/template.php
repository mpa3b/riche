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
/** @var \CBitrixComponentTemeplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

$this->setFrameMode(true);

$frame = $this->createFrame();

d($arResult);

?>

<?php if (!empty($arResult['ITEMS'])) { ?>

    <section class="catalog-top--front">

        <? $frame->begin(); ?>

        <div class="wrap">

            <? if(!empty($arResult['SECTIONS'])) { ?>
                <nav>
                    <? foreach ($arResult['SECTIONS'] as $i => $arSection) { ?>
                        <button data-id="<?= $arSection['SECTION_ID']; ?>"><?= $arSection['NAME']; ?></button>
                    <? } ?>
                </nav>
            <? } ?>

            <div class="items">

                <? foreach ($arResult['ITEMS'] as $i => $arItem) { ?>

                    <div class="item" data-section-id="<?= $arItem['SECTION_ID']; ?>">

                        <button data-id="<?= $arItem['ID']; ?>" data-action="favorite" class="transparent button">
                            <i class="icon-star"></i>
                        </button>

                        <div class="image">

                            <? if ($arItem['DETAIL_PICTURE']) { ?>

                                <?

                                $preload = CFile::ResizeImageGet(
                                    $arItem['DETAIL_PICTURE']['ID'],
                                    Thumb::calculateImageSize(Breakpoint::breakpoints['preload'], 2),
                                    BX_RESIZE_IMAGE_EXACT
                                );

                                $small = CFile::ResizeImageGet(
                                    $arItem['DETAIL_PICTURE']['ID'],
                                    Thumb::calculateImageSize(Breakpoint::breakpoints['small'], 2),
                                    BX_RESIZE_IMAGE_EXACT
                                );

                                $mobile = CFile::ResizeImageGet(
                                    $arItem['DETAIL_PICTURE']['ID'],
                                    Thumb::calculateImageSize(Breakpoint::breakpoints['mobile'], 2),
                                    BX_RESIZE_IMAGE_EXACT
                                );

                                $tablet = CFile::ResizeImageGet(
                                    $arItem['DETAIL_PICTURE']['ID'],
                                    Thumb::calculateImageSize(Breakpoint::breakpoints['tablet'] / 3, 1.75),
                                    BX_RESIZE_IMAGE_EXACT
                                );

                                $desktop = CFile::ResizeImageGet(
                                    $arItem['DETAIL_PICTURE']['ID'],
                                    Thumb::calculateImageSize(Breakpoint::breakpoints['desktop'] / 4, 2),
                                    BX_RESIZE_IMAGE_EXACT
                                );

                                $wide = CFile::ResizeImageGet(
                                    $arItem['DETAIL_PICTURE']['ID'],
                                    Thumb::calculateImageSize(Breakpoint::breakpoints['wide'] / 4, 2),
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

                                    <img data-src="<?= $preload['src']; ?>"
                                         alt="<?= $arItem['NAME']; ?>"
                                         loading="lazy">

                                </picture>

                            <? } ?>

                        </div>

                        <div class="details">

                            <? if(!empty($arItem['REVIEWS'])) { ?>

                                <div class="reviews">

                                    <i class="icon-star"></i>

                                    <span class="value"><?= $arItem['REVIEWS']['MEDIAN']; ?></span>
                                    <span class="count"><?= $arItem['REVIEWS']['COUNT']; ?></span>

                                </div>

                            <? } ?>

                            <h3><?= $arItem['NAME']; ?></h3>

                            <p><?= $arItem['PREVIEW_TEXT']; ?></p>

                        </div>

                        <div class="prices">

                            <? foreach ($arItem['PRICES'] as $arPrice) { ?>

                                <div class="price <?= strtolower($arPrice['CODE']); ?>">

                                    <? if($arPrice['DISCOUNT'] > 0) {?>
                                        <del class="old price"><?= $arPrice['BASE_PRICE']; ?></del>
                                        <span class="discount price"><?= $arPrice['PRICE']; ?></span>
                                    <? } else { ?>
                                        <span class="price"><?= $arPrice['PRICE']; ?></span>
                                    <? } ?>

                                </div>

                            <? } ?>

                        </div>

                        <div class="action">

                            <button class="primary add button" data-id="<?= $arItem['ID']; ?>">
                                <i class="icon-plus"></i>
                            </button>

                        </div>

                    </div>

                <? } ?>

            </div>

        </div>

        <? $frame->end(); ?>

    </section>

<?php } ?>
