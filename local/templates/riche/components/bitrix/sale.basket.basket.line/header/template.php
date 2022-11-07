<?php

if (!defined("B_PROLOG_INCLUDED") or B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Application;
use Riche\Thumb;
use Riche\Units;

/** @var array $arParams */
/** @var array $arResult */
/** @global \CMain $APPLICATION */
/** @global \CUser $USER */
/** @global \CDatabase $DB */
/** @var \CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var array $templateData */
/** @var \CBitrixComponent $component */

$context = Application ::getInstance() -> getContext();

$request = $context -> getRequest();

$cartUpdate = $request -> getPost('cartUpdate');

$this -> setFrameMode(true);

$frame = $this -> createFrame();

if (!$arResult['DISABLE_USE_BASKET']) { ?>

    <div class="basket-line--header">

        <a href="<?= $arParams['PATH_TO_BASKET']; ?>?back_url=<?= $APPLICATION -> GetCurUri(); ?>"
           title="<?= Units ::plural($arResult['NUM_PRODUCTS'], 'товар'); ?>"
           class="button transparent">

            <? $frame -> begin(); ?>

            <i class="icon-shopping-cart"></i>

            <? if ($arParams['SHOW_NUM_PRODUCTS'] == "Y") { ?>
                <span class="count"><? if ($arResult['NUM_PRODUCTS'] > 0) {
                        echo $arResult['NUM_PRODUCTS'];
                    } ?></span>
            <? } ?>

            <? $frame -> end(); ?>

        </a>


        <? if ($arParams['SHOW_PRODUCTS'] !== 'N') { ?>

            <div class="dropdown">

                <? if ($request -> isAjaxRequest() && $cartUpdate) {
                    $APPLICATION -> RestartBuffer();
                }
                else {
                    $dropdownFrame = $this -> createFrame();
                    $dropdownFrame -> begin();
                } ?>

                <? foreach ($arResult['CATEGORIES'] as $code => $arCategory) { ?>

                    <? if (empty($arCategory)) {
                        break;
                    } ?>

                    <div class="<?= strtolower($code); ?> items">

                        <? foreach ($arCategory as $arItem) {

                            $picture_preload = CFile ::ResizeImageGet(
                                $arItem['PREVIEW_PICTURE'],
                                Thumb ::calculateImageSize(32, 1),
                                BX_RESIZE_IMAGE_PROPORTIONAL,
                                false,
                                [],
                                false,
                                Thumb ::$JPEG_QUALITY_PRELOAD,
                            );

                            $picture = CFile ::ResizeImageGet(
                                $arItem['PREVIEW_PICTURE'],
                                Thumb ::calculateImageSize(64, 1),
                                BX_RESIZE_IMAGE_PROPORTIONAL,
                                false,
                                [],
                                false,
                                Thumb ::$JPEG_QUALITY,
                            );

                            Thumb ::getWebP($picture);

                            ?>

                            <div
                                    class="item <? if ($arItem['CAN_BUY'] !== 'Y') { ?>disabled<? } ?> <? if ($arItem['RESERVED'] == 'Y') { ?>reserved<? } ?>"
                                    data-id="<?= $arItem['ID']; ?>"
                                    data-product-id="<?= $arItem['PRODUCT_ID']; ?>">

                                <picture class="image">

                                    <source srcset="<?= $picture['src']; ?>"
                                            type="<?= $picture['content_type']; ?>">

                                    <? if ($picture['webp_src']) { ?>
                                        <source srcset="<?= $picture['webp_src']; ?>"
                                                type="<?= $picture['webp_content_type']; ?>">
                                    <? } ?>

                                    <img src="<?= $picture_preload['src']; ?>"
                                         alt="<?= htmlspecialchars($arItem['NAME']); ?>"
                                         loading="lazy">

                                </picture>

                                <div class="description">

                                    <span class="price--value price"><?= $arItem['PRICE_FMT']; ?></span>
                                    <span class="name"><?= htmlspecialchars($arItem['NAME']); ?></span>

                                </div>

                                <div class="numbers">

                                    <div class="quantity">
                                        <span class="label">Количество</span>
                                        <input type="number"
                                               data-action="update"
                                               class="quantity"
                                               min="1"
                                               step="1"
                                               data-id="<?= $arItem['PRODUCT_ID']; ?>"
                                               value="<?= $arItem['QUANTITY']; ?>">
                                    </div>

                                    <div class="total">
                                        <span class="label">Сумма</span>
                                        <span class="total--value value"><?= $arItem['SUM']; ?></span>
                                    </div>

                                </div>

                                <div class="actions">

                                    <button class="transparent button delete"
                                            title="Удалить"
                                            data-action="delete"
                                            data-id="<?= $arItem['PRODUCT_ID']; ?>">
                                        <i class="icon-delete"></i>
                                    </button>

                                </div>

                            </div>

                        <? } ?>

                    </div>

                <? } ?>

                <div class="bottom">

                    <p>Итого <span class="nowrap"><?= Units ::plural($arResult['NUM_PRODUCTS'], 'товар'); ?></span>
                        на сумму: <span class="nowrap"><?= $arResult['TOTAL_PRICE']; ?></span></p>

                </div>

                <form action="<?= $arParams['PATH_TO_BASKET']; ?>">
                    <button class="primary button" type="submit">
                        <i class="icon-check"></i>
                        Оформить заказ
                    </button>
                </form>

                <? if ($request -> isAjaxRequest() && $cartUpdate) {
                    die;
                }
                else {
                    $dropdownFrame -> end();
                } ?>

            </div>

        <? } ?>

    </div>

<? } ?>
