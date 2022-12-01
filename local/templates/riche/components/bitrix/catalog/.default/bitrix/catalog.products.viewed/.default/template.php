<?php

use Riche\Breakpoint;
use Riche\Thumb;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

/**
 * @global CMain                 $APPLICATION
 * @var array                    $arParams
 * @var array                    $arResult
 * @var CatalogSectionComponent  $component
 * @var CBitrixComponentTemplate $this
 */

$this->setFrameMode(true);

d($arResult);

if (!empty($arResult['ITEMS'])) {

    $this->addExternalJs(LOCAL_ASSETS . '/slick-carousel/slick/slick.js');
    $this->addExternalCss(LOCAL_ASSETS . '/slick-carousel/slick/slick.css');
    $this->addExternalCss(SITE_TEMPLATE_PATH . '/styles/slick.css');

    $frame = $this->createFrame();

    ?>

    <section class="catalog--default--viewed-products--default">

        <?php $frame->begin(); ?>

        <div class="wrap">

            <h2>Вы смотрели</h2>

            <div class="items slider">

                <?php foreach ($arResult['ITEMS'] as $arItem) { ?>

                    <div class="item section--<?= strtolower($arItem['IBLOCK_SECTION_CODE']); ?>">

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

                    </div>

                <?php } ?>

            </div>

        </div>

        <?php $frame->beginStub(); ?>

        <?php $frame->end(); ?>

    </section>

<?php } ?>
