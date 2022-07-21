<?php

if (!defined("B_PROLOG_INCLUDED") or B_PROLOG_INCLUDED !== true) die();

use Riche\Images;
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

$this->addExternalJs(Template::ASSETS . '/tiny-slider/dist/min/tiny-slider.js');
$this->addExternalCss(Template::ASSETS . '/tiny-slider/dist/tiny-slider.css');

$this->setFrameMode(true);

$frame = $this->createFrame();

?>

<?php if (!empty($arResult['ITEMS'])) { ?>

    <div class="reviews--front">

        <?php $frame->begin(); ?>

        <div class="wrap">

            <div class="slider items">

                <?php foreach ($arResult['ITEMS'] as $i => $arItem) { ?>

                    <div class="review item">

                        <div class="author">

                            <?

                            $authorImage = CFile::ResizeImageGet(
                                $arItem['DISPLAY_PROPERTIES']['AUTHOR_IMAGE']['VALUE'],
                                Images::calculateImageSize(120, 1),
                                BX_RESIZE_IMAGE_EXACT,
                                false,
                                [],
                                false
                            );

                            Images::getWebP($authorImage);

                            $authorImagePreload = CFile::ResizeImageGet(
                                $arItem['DISPLAY_PROPERTIES']['AUTHOR_IMAGE']['VALUE'],
                                Images::calculateImageSize(32, 1),
                                BX_RESIZE_IMAGE_EXACT,
                                false,
                                [],
                                false
                            );

                            ?>

                            <picture class="author--image">
                                <?php if ($authorImage['webp_src']) { ?>
                                    <source srcset="<?php echo $authorImage['webp_src']; ?>"
                                            type="<?php echo $authorImage['webp_content_type']; ?>"
                                            media="<?php echo Images::getMedia('mobile', true); ?>">
                                <?php } ?>

                                <source srcset="<?php echo $authorImage["SRC"]; ?>"
                                        type="<?php echo $authorImage['content_type']; ?>"
                                        media="<?php echo Images::getMedia('mobile', true); ?>">

                                <img src="<?php echo $authorImagePreload['src']; ?>"
                                     alt="<?php echo $arItem['DISPLAY_PROPERTIES']['AUTHOR_NAME']['VALUE']; ?>"
                                     loading="lazy">

                            </picture>

                            <span
                                class="author--name"><?php echo $arItem['DISPLAY_PROPERTIES']['AUTHOR_NAME']['VALUE']; ?></span>

                        </div>

                        <?php if (!empty($arItem['PROPERTIES']['RATING']['VALUE'])) { ?>
                            <div class="rating">
                                <span class="value"><?php echo $arItem['DISPLAY_PROPERTIES']['RATING']['VALUE']; ?></span>
                            </div>
                        <?php } ?>

                        <div class="content">e
                            <?php echo $arItem['DETAIL_TEXT']; ?>
                        </div>

                        <?php if (!empty($arItem['PROPERTIES']['IMAGES']['VALUE'])) { ?>
                            <div class="images">
                                <?php foreach ($arItem['DISPLAY_PROPERTIES']['IMAGES']['VALUE'] as $arImage) { ?>

                                    <?php

                                    $reviewImageMobile = CFile::ResizeImageGet(
                                        $arImage,
                                        Images::calculateImageSize(240, 0.66),
                                        BX_RESIZE_IMAGE_EXACT,
                                        false,
                                        [],
                                        false
                                    );

                                    $reviewImage = CFile::ResizeImageGet(
                                        $arImage,
                                        Images::calculateImageSize(320, 1.33),
                                        BX_RESIZE_IMAGE_EXACT,
                                        false,
                                        [],
                                        false
                                    );

                                    $reviewImagePreload = CFile::ResizeImageGet(
                                        $arImage,
                                        Images::calculateImageSize(120, 0.66),
                                        BX_RESIZE_IMAGE_EXACT,
                                        false,
                                        [],
                                        false
                                    );

                                    Images::getWebP($reviewImageMobile);
                                    Images::getWebP($reviewImage);

                                    ?>

                                    <picture>

                                        <?php if ($reviewImageMobile['webp_src']) { ?>
                                            <source srcset="<?php echo $reviewImageMobile['webp_src']; ?>"
                                                    type="<?php echo $reviewImageMobile['webp_content_type']; ?>"
                                                    media="<?php echo Images::getMedia('mobile', true); ?>">
                                        <?php } ?>

                                        <source srcset="<?php echo $reviewImageMobile["src"]; ?>"
                                                type="<?php echo $reviewImageMobile['content_type']; ?>"
                                                media="<?php echo Images::getMedia('mobile', true); ?>">

                                        <?php if ($reviewImage['webp_src']) { ?>
                                            <source srcset="<?php echo $reviewImage['webp_src']; ?>"
                                                    type="<?php echo $reviewImage['webp_content_type']; ?>"
                                                    media="<?php echo Images::getMedia('mobile'); ?>">
                                        <?php } ?>

                                        <source srcset="<?php echo $reviewImage["src"]; ?>"
                                                type="<?php echo $reviewImage['content_type']; ?>"
                                                media="<?php echo Images::getMedia('mobile'); ?>">

                                        <img src="<?php echo $reviewImagePreload['src']; ?>" loading="lazy">

                                    </picture>

                                <?php } ?>
                            </div>

                        <?php } ?>

                        <div class="actions">

                            <button class="button primary">Плевать</button>
                            <button class="button">Срать</button>

                        </div>

                    </div>

                <?php } ?>

            </div>

        </div>

        <?php $frame->end(); ?>

    </div>

    <?php d($arResult); ?>

<?php } ?>
