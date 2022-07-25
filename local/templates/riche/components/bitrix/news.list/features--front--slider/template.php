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

    <div class="features--front--slider">

        <?php $frame->begin(); ?>

        <div class="wrap">

            <div class="slider items">

                <?php foreach ($arResult['ITEMS'] as $i => $arItem) {

                    $imageMobile = CFile::ResizeImageGet(
                        $arItem['DETAIL_PICTURE'],
                        Images::calculateImageSize(375, 0.75),
                        BX_RESIZE_IMAGE_EXACT,
                        false,
                        [],
                        false
                    );

                    Images::getWebP($imageMobile);

                    $image = CFile::ResizeImageGet(
                        $arItem['DETAIL_PICTURE'],
                        Images::calculateImageSize(480, 0.75),
                        BX_RESIZE_IMAGE_EXACT,
                        false,
                        [],
                        false
                    );

                    Images::getWebP($image);

                    $imagePreload = CFile::ResizeImageGet(
                        $arItem['DETAIL_PICTURE'],
                        Images::calculateImageSize(120, 0.75),
                        BX_RESIZE_IMAGE_EXACT,
                        false,
                        [],
                        false
                    );

                    ?>

                    <div class="item">

                        <div class="wrapper">

                            <picture>

                            <?php if (!empty($arItem['DETAIL_PICTURE'])) { ?>

                                <?php if ($imageMobile['webp_src']) { ?>
                                    <source srcset="<?php echo $imageMobile['webp_src']; ?>"
                                            type="<?php echo $imageMobile['webp_content_type']; ?>"
                                            media="<?php echo Images::getMedia('mobile', true); ?>">
                                <?php } ?>

                                <source srcset="<?php echo $imageMobile["src"]; ?>"
                                        type="<?php echo $imageMobile['content_type']; ?>"
                                        media="<?php echo Images::getMedia('mobile', true); ?>">

                                <?php if ($image['webp_src']) { ?>
                                    <source srcset="<?php echo $image['webp_src']; ?>"
                                            type="<?php echo $image['webp_content_type']; ?>"
                                            media="<?php echo Images::getMedia('mobile'); ?>">
                                <?php } ?>

                                <source srcset="<?php echo $image["src"]; ?>"
                                        type="<?php echo $image['content_type']; ?>"
                                        media="<?php echo Images::getMedia('mobile'); ?>">

                                <img src="<?php echo $imagePreload['src']; ?>"
                                     loading="lazy">

                            <?php } else { ?>

                                <img src="<?php echo Images::PLACEHOLDER; ?>">

                            <? } ?>

                        </picture>

                            <div class="caption">

                                <h3><?php echo $arItem['NAME']; ?></h3>
                                <p><?php echo $arItem['PREVIEW_TEXT']; ?></p>

                            </div>

                        </div>

                    </div>

                <?php } ?>

            </div>

        </div>

        <?php $frame->end(); ?>

    </div>

    <?php d($arResult); ?>

<?php } ?>
