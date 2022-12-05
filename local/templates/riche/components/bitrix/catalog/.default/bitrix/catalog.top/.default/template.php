<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Riche\Breakpoint;
use Riche\Thumb;
use Riche\Units;

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

?>

<?php if (!empty($arResult['ITEMS'])) { ?>

    <?php $frame = $this->createFrame(); ?>

    <section class="catalog-top--catalog--default wrap">

        <?php if (!empty($arParams['TITLE'])) { ?>
            <h2><?= $arParams['TITLE']; ?></h2>
        <?php } ?>

        <div class="items grid">

            <?php $frame->begin(); ?>

            <?php foreach ($arResult['ITEMS'] as $i => $arItem) { ?>

                <div class="item"
                     data-section-id="<?= $arItem['IBLOCK_SECTION_ID']; ?>"
                     data-id="<?= $arItem['ID']; ?>">

                    <?php if (!empty($arItem['SECTION_NAME'])) { ?>
                        <span class="section marker"><?= $arItem['SECTION_NAME']; ?></span>
                    <?php } ?>

                    <button class="transparent favorite button"
                            data-id="<?= $arItem['ID']; ?>"
                            data-action="favorite">
                        <i class="icon-heart"></i>
                    </button>

                    <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>">

                        <?php

                        $preload = CFile::ResizeImageGet(
                            $arItem['DETAIL_PICTURE']['ID'],
                            Thumb::calculateImageSize(Breakpoint::breakpoints['preload'], 0.75),
                            BX_RESIZE_IMAGE_EXACT
                        );

                        $small = CFile::ResizeImageGet(
                            $arItem['DETAIL_PICTURE']['ID'],
                            Thumb::calculateImageSize(Breakpoint::breakpoints['small'], 0.75),
                            BX_RESIZE_IMAGE_EXACT
                        );

                        $mobile = CFile::ResizeImageGet(
                            $arItem['DETAIL_PICTURE']['ID'],
                            Thumb::calculateImageSize(Breakpoint::breakpoints['mobile'], 0.75),
                            BX_RESIZE_IMAGE_EXACT
                        );

                        $tablet = CFile::ResizeImageGet(
                            $arItem['DETAIL_PICTURE']['ID'],
                            Thumb::calculateImageSize(Breakpoint::breakpoints['tablet'] / 3, 0.75),
                            BX_RESIZE_IMAGE_EXACT
                        );

                        $desktop = CFile::ResizeImageGet(
                            $arItem['DETAIL_PICTURE']['ID'],
                            Thumb::calculateImageSize(Breakpoint::breakpoints['desktop'] / 4, 0.75),
                            BX_RESIZE_IMAGE_EXACT
                        );

                        $wide = CFile::ResizeImageGet(
                            $arItem['DETAIL_PICTURE']['ID'],
                            Thumb::calculateImageSize(Breakpoint::breakpoints['wide'] / 4, 0.75),
                            BX_RESIZE_IMAGE_EXACT
                        );

                        ?>

                        <picture class="image">

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
                                 loading="lazy"
                                 alt="<?= $arItem['NAME']; ?>">

                        </picture>

                    </a>

                    <?php if (!empty($arItem['REVIEWS'])) { ?>

                        <div class="reviews">

                            <i class="icon-star"></i>

                            <span class="value"><?= $arItem['REVIEWS']['MEDIAN']; ?></span>
                            <span class="count"><?= Units::plural($arItem['REVIEWS']['COUNT'],
                                                                  'отзыв') ?></span>

                        </div>

                    <?php } ?>

                    <h3>
                        <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>"><?= $arItem['NAME']; ?></a>
                    </h3>

                    <?php if ($arItem['ITEM_PRICES_CAN_BUY'] == true) { ?>

                        <div class="actions">

                            <?php if (!empty($arItem['ITEM_PRICES'])) { ?>

                                <div class="prices">

                                    <?php foreach ($arItem['ITEM_PRICES'] as $arPrice) { ?>

                                        <div class="price <?= strtolower($arPrice['CODE']); ?>">

                                            <?php if ($arPrice['DISCOUNT'] > 0) { ?>
                                                <del class="old price"><?= $arPrice['PRINT_BASE_PRICE']; ?></del>
                                                <span class="discount price"><?= $arPrice['PRINT_PRICE']; ?></span>
                                            <?php } else { ?>
                                                <span class="price"><?= $arPrice['PRINT_PRICE']; ?></span>
                                            <?php } ?>

                                        </div>

                                    <?php } ?>

                                </div>

                            <?php } ?>

                            <div class="controls">

                                <?php if ($arParams['USE_QUANTITY']) { ?>
                                    <input type="number"
                                           name="quantity"
                                           step="1"
                                           max="<?= $arItem['PRODUCT']['QUANTITY']; ?>">
                                <?php } ?>

                                <button class="primary buy button"
                                        data-quantity=""
                                        <?php if (!$arItem['CAN_BUY']) { ?>disabled<?php } ?>
                                        data-id="<?= $arItem['ID']; ?>"
                                        data-action="buy">
                                    <i class="icon-shopping-cart"></i>
                                </button>

                            </div>

                        </div>

                    <?php } ?>

                    <?php if (!empty($arItem['PREVIEW_TEXT']) && false) { ?>

                        <div class="description">
                            <?= $arItem['PREVIEW_TEXT']; ?>
                        </div>

                    <?php } ?>

                </div>

            <?php } ?>

            <?php $frame->beginStub(); ?>

            <?php $frame->end(); ?>

        </div>

    </section>

<?php } ?>
