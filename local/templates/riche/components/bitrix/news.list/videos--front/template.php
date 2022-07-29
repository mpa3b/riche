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

$this->addExternalJs(Template::ASSETS . '/jquery-colorbox/jquery.colorbox-min.js');

$this->setFrameMode(true);

$frame = $this->createFrame();

?>

<?php if (!empty($arResult['ITEMS'])) { ?>

    <div class="videos--front">

        <?php $frame->begin(); ?>

        <div class="wrap">

            <div class="slider items">

                <?php foreach ($arResult['ITEMS'] as $i => $arItem) { ?>

                    <?php

                    $image = CFile::ResizeImageGet(
                        $arItem['DETAIL_PICTURE'],
                        Images::calculateImageSize(Images::BREAKPOINTS['mobile'], 0.77),
                        BX_RESIZE_IMAGE_EXACT,
                        false,
                        [],
                        false
                    );


                    $imageMobile = CFile::ResizeImageGet(
                        $arItem['DETAIL_PICTURE'],
                        Images::calculateImageSize(Images::BREAKPOINTS['mobile'], 0.77),
                        BX_RESIZE_IMAGE_EXACT,
                        false,
                        [],
                        false
                    );

                    Images::getWebP($image);
                    Images::getWebP($imageMobile);

                    $imagePreload = CFile::ResizeImageGet(
                        $arItem['DETAIL_PICTURE'],
                        Images::calculateImageSize(120, 0.77),
                        BX_RESIZE_IMAGE_EXACT,
                        false,
                        [],
                        false
                    );

                    ?>

                    <div class="item">

                        <div class="wrapper">

                            <a href="#video-<?php echo $arItem['ID']; ?>"
                               class="modal--video"
                               rel="videos--front">

                                <i class="icon video"></i>

                                <picture>

                                    <?php if (!empty($arItem['DETAIL_PICTURE'])) { ?>

                                        <?php if ($imageMobile['webp_src']) { ?>
                                            <source srcset="<?php echo $imageMobile['webp_src']; ?>"
                                                    type="<?php echo $imageMobile['webp_content_type']; ?>"
                                                    media="<?php echo Images::getMedia('mobile', true); ?>">
                                        <?php } ?>

                                        <source srcset="<?php echo $image["src"]; ?>"
                                                type="<?php echo $image['content_type']; ?>"
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

                                        <img src="<?php echo Images::PLACEHOLDER; ?>" loading="lazy">

                                    <? } ?>

                                </picture>

                                <div hidden>

                                    <div id="video-<?php echo $arItem['ID']; ?>" class="video popup-video">

                                        <video preload="auto" controls>
                                            <source
                                                src="<?php echo $arItem['DISPLAY_PROPERTIES']['VIDEO']['VALUE']['path']; ?>">
                                        </video>

                                        <?php /*

                                        <button class="transparent button play">
                                            <i class="icon play"></i>
                                        </button>

                                        <button class="transparent button pause">
                                            <i class="icon pause"></i>
                                        </button>

                                        */ ?>

                                    </div>

                                </div>


                            </a>

                        </div>

                    </div>

                <?php } ?>

            </div>

        </div>

        <?php $frame->end(); ?>

    </div>

<?php } ?>
