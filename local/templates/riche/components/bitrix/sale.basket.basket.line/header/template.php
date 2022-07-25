<?php

if (!defined("B_PROLOG_INCLUDED") or B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Application;
use Riche\Images;
use Riche\PreloadLinks;
use Riche\Template;

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

global $APPLICATION, $USER;

$context = Application::getInstance()->getContext();
$request = $context->getRequest();

$cartUpdate = $request->getPost('cartUpdate');

$this->setFrameMode(true);

$frame = $this->createFrame();

if (!$arResult['DISABLE_USE_BASKET']) { ?>

    <div class="basket--header-line">

        <?php $frame->begin(); ?>

        <a href="<?= $arParams['PATH_TO_BASKET']; ?>?back_url=<?= $APPLICATION->GetCurUri(); ?>"
           title="<?= Template::pluralUnits($arResult['NUM_PRODUCTS'], 'товар'); ?>"
           class="button transparent">

            <i class="icon cart"></i>

            <?php if ($arParams['SHOW_NUM_PRODUCTS'] == "Y") { ?>
                <span class="count"><?php if ($arResult['NUM_PRODUCTS'] > 0) echo $arResult['NUM_PRODUCTS']; ?></span>
            <?php } ?>

        </a>

        <?php $frame->end(); ?>

        <?php if ($arParams['SHOW_PRODUCTS']) { ?>

            <div class="dropdown">

                <?php if (IS_AJAX && $cartUpdate) {
                    $APPLICATION->RestartBuffer();
                } else {
                    $dropdownFrame = $this->createFrame();
                    $dropdownFrame->begin();
                } ?>

                <?php foreach ($arResult['CATEGORIES'] as $code => $arCategory) { ?>

                    <?php if (empty($arCategory)) break; ?>

                    <div class="<?= strtolower($code); ?> items">

                        <?php foreach ($arCategory as $arItem) {

                            $picture_preload = CFile::ResizeImageGet(
                                $arItem['PREVIEW_PICTURE'],
                                Images::calculateImageSize(32, 1),
                                BX_RESIZE_IMAGE_PROPORTIONAL,
                                false,
                                [],
                                false,
                                Images::JPEG_QUALITY_PRELOAD,
                            );

                            $picture = CFile::ResizeImageGet(
                                $arItem['PREVIEW_PICTURE'],
                                Images::calculateImageSize(64, 1),
                                BX_RESIZE_IMAGE_PROPORTIONAL,
                                false,
                                [],
                                false,
                                Images::JPEG_QUALITY,
                            );

                            Images::getWebP($picture);

                            ?>

                            <div
                                class="item <?php if ($arItem['CAN_BUY'] !== 'Y') { ?>disabled<?php } ?> <?php if ($arItem['RESERVED'] == 'Y') { ?>reserved<?php } ?>"
                                data-id="<?= $arItem['ID']; ?>"
                                data-product-id="<?= $arItem['PRODUCT_ID']; ?>">

                                <picture class="image">

                                    <source srcset="<?= $picture['src']; ?>"
                                            type="<?= $picture['content_type']; ?>">

                                    <?php if ($picture['webp_src']) { ?>
                                        <source srcset="<?= $picture['webp_src']; ?>"
                                                type="<?= $picture['webp_content_type']; ?>">
                                    <?php } ?>

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
                                        <i class="icon trashcan"></i>
                                    </button>

                                </div>

                            </div>

                        <?php } ?>

                    </div>

                <?php } ?>

                <div class="bottom">

                    <p>Итого <?= Template::pluralUnits($arResult['NUM_PRODUCTS'], 'товар'); ?> на сумму: <span
                            class="nowrap"><?= $arResult['TOTAL_PRICE']; ?></span></p>

                </div>

                <a href="<?= $arParams['PATH_TO_BASKET']; ?>"
                   class="button">Перейти корзину</a>

                <?php if (IS_AJAX && $cartUpdate) {
                    die;
                } else {
                    $dropdownFrame->end();
                } ?>

            </div>

        <?php } ?>

    </div>

<?php } ?>
