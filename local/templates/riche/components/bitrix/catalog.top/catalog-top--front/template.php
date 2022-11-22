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

$this->addExternalJs(LOCAL_ASSETS . '/slick-carousel/slick/slick.js');
$this->addExternalCss(LOCAL_ASSETS . '/slick-carousel/slick/slick.css');
$this->addExternalCss(SITE_TEMPLATE_PATH . '/styles/slick.css');

$this->setFrameMode(true);

$frame = $this->createFrame();

?>

<?php if (!empty($arResult['ITEMS'])) { ?>

    <section class="catalog-top--front">

        <? $frame->begin(); ?>

        <div class="wrap">

            <? if (!empty($arResult['SECTIONS'])) { ?>

                <div class="filter">

                    <? foreach ($arResult['SECTIONS'] as $i => $arSection) { ?>
                        <button class="filter-button"
                                data-action="filter"
                                data-id="<?= $arSection['ID']; ?>"><?= $arSection['NAME']; ?></button>
                    <? } ?>

                </div>

            <? } ?>

            <div class="items slider">

                <? foreach ($arResult['ITEMS'] as $i => $arItem) { ?>

                    <div class="item" data-section-id="<?= $arItem['IBLOCK_SECTION_ID']; ?>"
                         data-id="<?= $arItem['ID']; ?>">

                        <div class="image">

                            <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>">

                                <? if ($arItem['DISPLAY_PROPERTIES']['VIDEO']) { ?>

                                    <video <? if ($i == 0) { ?>autoplay<? } ?> muted loop>
                                        <source data-src="<?= $arItem['DISPLAY_PROPERTIES']['VIDEO']['VALUE']['path']; ?>">
                                    </video>

                                <? } ?>

                                <?

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
                                        <? if ($i == 0) { ?>
                                            loading="eager"
                                        <? } else { ?>
                                            loading="lazy"
                                        <? } ?>
                                         alt="<?= $arItem['NAME']; ?>">

                                </picture>

                            </a>

                        </div>

                        <? if (!empty($arItem['REVIEWS'])) { ?>

                            <div class="reviews">

                                <i class="icon-star"></i>

                                <span class="value"><?= $arItem['REVIEWS']['MEDIAN']; ?></span>
                                <span class="count"><?= Units::plural($arItem['REVIEWS']['COUNT'],
                                                                      'отзыв') ?></span>

                            </div>

                        <? } ?>

                        <div class="details">

                            <h3>
                                <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>"><?= $arItem['NAME']; ?></a>
                            </h3>

                            <? if (!empty($arItem['PREVIEW_TEXT'])) { ?>

                                <p><?= $arItem['PREVIEW_TEXT']; ?></p>

                            <? } ?>

                        </div>

                        <? if ($arParams['USE_BUY'] == "Y" && $arItem['ITEM_PRICES_CAN_BUY'] && false) { ?>

                            <? if (!empty($arItem['ITEM_PRICES'])) { ?>

                                <div class="prices">

                                    <? foreach ($arItem['ITEM_PRICES'] as $arPrice) { ?>

                                        <div class="price <?= strtolower($arPrice['CODE']); ?>">

                                            <? if ($arPrice['DISCOUNT'] > 0) { ?>
                                                <del class="old price"><?= $arPrice['PRINT_BASE_PRICE']; ?></del>
                                                <span class="discount price"><?= $arPrice['PRINT_PRICE']; ?></span>
                                            <? } else { ?>
                                                <span class="price"><?= $arPrice['PRINT_PRICE']; ?></span>
                                            <? } ?>

                                        </div>

                                    <? } ?>

                                </div>

                            <? } ?>

                            <div class="action">

                                <? if ($arParams['USE_QUANTITY']) { ?>
                                    <input type="number"
                                           name="quantity"
                                           step="1"
                                           max="<?= $arItem['PRODUCT']['QUANTITY']; ?>">
                                <? } ?>

                                <button class="add button"
                                        <? if (!$arItem['CAN_BUY']) { ?>disabled<? } ?>
                                        data-quantity=""
                                        data-id="<?= $arItem['ID']; ?>"
                                        data-action="add">
                                    <i class="icon-plus"></i>
                                </button>

                                <button class="primary buy button"
                                        data-quantity=""
                                        <? if (!$arItem['CAN_BUY']) { ?>disabled<? } ?>
                                        data-id="<?= $arItem['ID']; ?>"
                                        data-action="buy">
                                    <i class="icon-buy"></i>
                                </button>

                            </div>

                        <? } ?>

                    </div>

                <? } ?>

            </div>

            <div class="footer">

                <a href="<?= SHOP_ROOT_URL; ?>" class="mobiles-only">
                    Перейти в каталог
                    <i class="icon-chevron-right rounded button"></i>
                </a>

                <a href="<?= SHOP_ROOT_URL; ?>" class="primary big desktop-only button">
                    Перейти в каталог
                </a>

            </div>

        </div>

        <? $frame->end(); ?>

    </section>

<?php } ?>
