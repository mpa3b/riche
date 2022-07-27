<?php if (!defined("B_PROLOG_INCLUDED") or B_PROLOG_INCLUDED !== true) die();

use Riche\Images;

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

$this->setFrameMode(true);

$frame = $this->createFrame();

?>

<div class="banners--front--static">

    <?php $frame->begin(); ?>

    <div class="wrap">

        <div class="items">

            <?php foreach ($arResult['ITEMS'] as $i => $arItem) {

                if ($i == 0) {

                    $backgroundImageMobile = CFile::ResizeImageGet(
                        $arItem['DISPLAY_PROPERTIES']['BACKGROUND_IMAGE']['VALUE'],
                        Images::calculateImageSize(Images::BREAKPOINTS['mobile'], 0.66),
                        BX_RESIZE_IMAGE_EXACT,
                        false,
                        [],
                        false
                    );

                    $backgroundImage = CFile::ResizeImageGet(
                        $arItem['DISPLAY_PROPERTIES']['BACKGROUND_IMAGE']['VALUE'],
                        Images::calculateImageSize(Images::BREAKPOINTS['desktop'], 2),
                        BX_RESIZE_IMAGE_EXACT,
                        false,
                        [],
                        false
                    );

                    $backgroundImagePreload = CFile::ResizeImageGet(
                        $arItem['DISPLAY_PROPERTIES']['BACKGROUND_IMAGE']['VALUE'],
                        Images::calculateImageSize(Images::BREAKPOINTS['mobile'] / 2, 1),
                        BX_RESIZE_IMAGE_EXACT,
                        false,
                        [],
                        false
                    );

                    Images::getWebP($backgroundImageMobile);
                    Images::getWebP($backgroundImage);
                    Images::getWebP($backgroundImagePreload);

                    $heroImageMobile = CFile::ResizeImageGet(
                        $arItem['DETAIL_PICTURE'],
                        Images::calculateImageSize(Images::BREAKPOINTS['mobile']),
                        BX_RESIZE_IMAGE_PROPORTIONAL,
                        false,
                        [],
                        false
                    );

                    $heroImage = CFile::ResizeImageGet(
                        $arItem['DETAIL_PICTURE'],
                        Images::calculateImageSize(Images::BREAKPOINTS['desktop']),
                        BX_RESIZE_IMAGE_PROPORTIONAL,
                        false,
                        [],
                        false
                    );

                    $heroImagePreload = CFile::ResizeImageGet(
                        $arItem['DETAIL_PICTURE'],
                        Images::calculateImageSize(Images::BREAKPOINTS['mobile'] / 2),
                        BX_RESIZE_IMAGE_PROPORTIONAL,
                        false,
                        [],
                        false
                    );

                    Images::getWebP($heroImageMobile);
                    Images::getWebP($heroImage);
                    Images::getWebP($heroImagePreload);

                } else {

                    $backgroundImageMobile = CFile::ResizeImageGet(
                        $arItem['DISPLAY_PROPERTIES']['BACKGROUND_IMAGE']['VALUE'],
                        Images::calculateImageSize(Images::BREAKPOINTS['mobile'], 0.66),
                        BX_RESIZE_IMAGE_EXACT,
                        false,
                        [],
                        false
                    );

                    $backgroundImage = CFile::ResizeImageGet(
                        $arItem['DISPLAY_PROPERTIES']['BACKGROUND_IMAGE']['VALUE'],
                        Images::calculateImageSize(Images::BREAKPOINTS['desktop'] / 2, 1.5),
                        BX_RESIZE_IMAGE_EXACT,
                        false,
                        [],
                        false
                    );

                    $backgroundImagePreload = CFile::ResizeImageGet(
                        $arItem['DISPLAY_PROPERTIES']['BACKGROUND_IMAGE']['VALUE'],
                        Images::calculateImageSize(Images::BREAKPOINTS['mobile'] / 2, 1),
                        BX_RESIZE_IMAGE_EXACT,
                        false,
                        [],
                        false
                    );

                    Images::getWebP($backgroundImageMobile);
                    Images::getWebP($backgroundImage);
                    Images::getWebP($backgroundImagePreload);

                    $heroImageMobile = CFile::ResizeImageGet(
                        $arItem['DETAIL_PICTURE'],
                        Images::calculateImageSize(Images::BREAKPOINTS['mobile']),
                        BX_RESIZE_IMAGE_PROPORTIONAL,
                        false,
                        [],
                        false
                    );

                    $heroImage = CFile::ResizeImageGet(
                        $arItem['DETAIL_PICTURE'],
                        Images::calculateImageSize(Images::BREAKPOINTS['desktop'] / 2),
                        BX_RESIZE_IMAGE_PROPORTIONAL,
                        false,
                        [],
                        false
                    );

                    $heroImagePreload = CFile::ResizeImageGet(
                        $arItem['DETAIL_PICTURE'],
                        Images::calculateImageSize(Images::BREAKPOINTS['mobile'] / 2),
                        BX_RESIZE_IMAGE_PROPORTIONAL,
                        false,
                        [],
                        false
                    );

                    Images::getWebP($heroImageMobile);
                    Images::getWebP($heroImage);
                    Images::getWebP($heroImagePreload);

                } ?>

                <div class="item">

                    <div class="wrapper">

                        <div class="caption">

                            <h3><?php echo $arItem['NAME']; ?></h3>

                            <?php if (!empty($arItem['PREVIEW_TEXT'])) { ?>
                                <div class="details">
                                    <?php echo $arItem['PREVIEW_TEXT']; ?>
                                </div>
                            <?php } ?>

                            <?php if ($arItem['DISPLAY_PROPERTIES']['BUTTON_TEXT']) { ?>
                                <button
                                    class="big action button primary"><?php echo $arItem['DISPLAY_PROPERTIES']['BUTTON_TEXT']['VALUE']; ?></button>
                            <?php } ?>

                        </div>

                        <?php if (!empty($arItem['DETAIL_PICTURE'])) { ?>

                            <picture class="hero-image">

                                <?php if ($heroImageMobile['webp_src']) { ?>
                                    <source srcset="<?= $heroImageMobile['webp_src']; ?>"
                                            type="<?= $heroImageMobile['webp_content_type']; ?>"
                                            media="<?= Images::getMedia('mobile', true); ?>">
                                <?php } ?>

                                <source srcset="<?= $heroImageMobile["src"]; ?>"
                                        type="<?= $heroImageMobile['content_type']; ?>"
                                        media="<?= Images::getMedia('mobile', true); ?>">

                                <?php if ($heroImage['webp_src']) { ?>
                                    <source srcset="<?= $heroImage['webp_src']; ?>"
                                            type="<?= $heroImage['webp_content_type']; ?>"
                                            media="<?= Images::getMedia('mobile'); ?>">
                                <?php } ?>

                                <source srcset="<?= $heroImage["src"]; ?>"
                                        type="<?= $heroImage['content_type']; ?>"
                                        media="<?= Images::getMedia('mobile'); ?>">

                                <img src="<?= $heroImagePreload['src']; ?>" loading="lazy"
                                     title="<?= $arItem['NAME']; ?>">

                            </picture>

                        <?php } ?>

                    </div>

                    <?php if (!empty($arItem['PROPERTIES']['BACKGROUND_IMAGE']['VALUE'])) { ?>

                        <picture class="background-image">

                            <?php if ($backgroundImageMobile['webp_src']) { ?>
                                <source srcset="<?= $backgroundImageMobile['webp_src']; ?>"
                                        type="<?= $backgroundImageMobile['webp_content_type']; ?>"
                                        media="<?= Images::getMedia('mobile', true); ?>">
                            <?php } ?>

                            <source srcset="<?= $backgroundImage["src"]; ?>"
                                    type="<?= $backgroundImage['content_type']; ?>"
                                    media="<?= Images::getMedia('mobile', true); ?>">

                            <?php if ($backgroundImage['webp_src']) { ?>
                                <source srcset="<?= $backgroundImage['webp_src']; ?>"
                                        type="<?= $backgroundImage['webp_content_type']; ?>"
                                        media="<?= Images::getMedia('mobile'); ?>">
                            <?php } ?>

                            <source srcset="<?= $backgroundImage["src"]; ?>"
                                    type="<?= $backgroundImage['content_type']; ?>"
                                    media="<?= Images::getMedia('mobile'); ?>">

                            <img src="<?= $backgroundImagePreload['src']; ?>" loading="lazy">

                        </picture>

                    <?php } ?>

                </div>

            <?php } ?>

        </div>

    </div>

    <?php $frame->end(); ?>

</div>
