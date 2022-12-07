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

if (!empty($arResult['ITEMS'])) {

    $this->addExternalJs(LOCAL_ASSETS . '/slick-carousel/slick/slick.js');
    $this->addExternalCss(LOCAL_ASSETS . '/slick-carousel/slick/slick.css');
    $this->addExternalCss(SITE_TEMPLATE_PATH . '/styles/slick.css');

    $frame = $this->createFrame();

    ?>

    <section class="catalog-top--catalog--slider wrap">

        <?php if (!empty($arParams['BLOCK_TITLE'])) { ?>
            <h2><?= $arParams['BLOCK_TITLE']; ?></h2>
        <?php } ?>

        <?php $frame->begin(); ?>

        <div class="items slider">

            <?php foreach ($arResult['ITEMS'] as $i => $arItem) { ?>

                <div class="item"
                     data-section-id="<?= $arItem['IBLOCK_SECTION_ID']; ?>"
                     data-id="<?= $arItem['ID']; ?>">

                    <div class="image">

                        <?php if (!empty($arItem['SECTION_NAME'])) { ?>
                            <span class="section marker"><?= $arItem['SECTION_NAME']; ?></span>
                        <?php } ?>

                        <button class="transparent favorite button" data-id="<?= $arItem['ID']; ?>"
                                data-action="favorite">
                            <i class="icon-heart"></i>
                        </button>

                        <?php if (!empty($arItem['DISPLAY_PROPERTIES']['PURPOSE']['DISPLAY_VALUE'])) { ?>
                            <ul class="purpose marker">
                                <?php foreach ($arItem['DISPLAY_PROPERTIES']['PURPOSE']['DISPLAY_VALUE'] as $element) { ?>
                                    <li><?= strip_tags($element); ?></li>
                                <?php } ?>
                            </ul>
                        <?php } ?>

                        <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>">

                            <?php if ($arItem['DISPLAY_PROPERTIES']['VIDEO']) { ?>

                                <video <?php if ($i == 0) { ?>autoplay<?php } ?> muted loop>
                                    <?php if ($i == 0) { ?>
                                        <source src="<?= $arItem['DISPLAY_PROPERTIES']['VIDEO']['VALUE']['path']; ?>">
                                    <?php } else { ?>
                                        <source
                                            data-src="<?= $arItem['DISPLAY_PROPERTIES']['VIDEO']['VALUE']['path']; ?>">
                                    <?php } ?>
                                </video>

                            <?php } ?>

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

                            <picture>

                                <?php if ($i == 0) { ?>

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

                                    <img src="<?= $preload['src']; ?>"
                                         alt="<?= $arItem['NAME']; ?>">

                                <?php } else { ?>

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

                                <?php } ?>

                            </picture>

                        </a>

                    </div>

                    <?php if (!empty($arItem['REVIEWS'])) { ?>

                        <div class="reviews">

                            <i class="icon-star"></i>

                            <span class="value"><?= $arItem['REVIEWS']['MEDIAN']; ?></span>
                            <span class="count"><?= Units::plural($arItem['REVIEWS']['COUNT'],
                                                                  'отзыв') ?></span>

                        </div>

                    <?php } ?>

                    <div class="details">

                        <h3>
                            <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>"><?= $arItem['NAME']; ?></a>
                        </h3>

                    </div>

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

        <?php $frame->beginStub(); ?>

        <?php $frame->end(); ?>

    </section>

<?php } ?>
