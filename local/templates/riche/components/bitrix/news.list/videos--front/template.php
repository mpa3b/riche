<?php

if (!defined("B_PROLOG_INCLUDED") or B_PROLOG_INCLUDED !== true) die();

use Riche\Breakpoint;
use Riche\Thumb;

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

$this->addExternalJs(LOCAL_ASSETS . '/tiny-slider/dist/min/tiny-slider.js');
$this->addExternalCss(LOCAL_ASSETS . '/tiny-slider/dist/tiny-slider.css');

$this->addExternalJs(LOCAL_ASSETS . '/jquery-colorbox/jquery.colorbox-min.js');

$this->setFrameMode(true);

$frame = $this->createFrame();

?>

<? if (!empty($arResult['ITEMS'])) { ?>

    <div class="videos--front">

        <? $frame->begin(); ?>

        <div class="wrap">

            <div class="slider items">

                <? foreach ($arResult['ITEMS'] as $i => $arItem) { ?>

                    <?php

                    $image = CFile::ResizeImageGet(
                        $arItem['DETAIL_PICTURE'],
                        Thumb::calculateImageSize(Breakpoint::mobile, 0.77),
                        BX_RESIZE_IMAGE_EXACT,
                        false,
                        [],
                        false
                    );


                    $imageMobile = CFile::ResizeImageGet(
                        $arItem['DETAIL_PICTURE'],
                        Thumb::calculateImageSize(Breakpoint::mobile, 0.77),
                        BX_RESIZE_IMAGE_EXACT,
                        false,
                        [],
                        false
                    );

                    Thumb::getWebP($image);
                    Thumb::getWebP($imageMobile);

                    $imagePreload = CFile::ResizeImageGet(
                        $arItem['DETAIL_PICTURE'],
                        Thumb::calculateImageSize(120, 0.77),
                        BX_RESIZE_IMAGE_EXACT,
                        false,
                        [],
                        false
                    );

                    ?>

                    <div class="item">

                        <div class="wrapper">

                            <a href="#video-<?= $arItem['ID']; ?>"
                               class="modal--video"
                               rel="videos--front">

                                <i class="icon-video"></i>

                                <picture>

                                    <? if (!empty($arItem['DETAIL_PICTURE'])) { ?>

                                        <? if ($imageMobile['webp_src']) { ?>
                                            <source srcset="<?= $imageMobile['webp_src']; ?>"
                                                    type="<?= $imageMobile['webp_content_type']; ?>"
                                                    media="<?= Images::getMedia('mobile', true); ?>">
                                        <? } ?>

                                        <source srcset="<?= $image["src"]; ?>"
                                                type="<?= $image['content_type']; ?>"
                                                media="<?= Images::getMedia('mobile', true); ?>">

                                        <? if ($image['webp_src']) { ?>
                                            <source srcset="<?= $image['webp_src']; ?>"
                                                    type="<?= $image['webp_content_type']; ?>"
                                                    media="<?= Images::getMedia('mobile'); ?>">
                                        <? } ?>

                                        <source srcset="<?= $image["src"]; ?>"
                                                type="<?= $image['content_type']; ?>"
                                                media="<?= Images::getMedia('mobile'); ?>">

                                        <img src="<?= $imagePreload['src']; ?>"
                                             loading="lazy">

                                    <? } else { ?>

                                        <img src="<?= Images::PLACEHOLDER; ?>" loading="lazy">

                                    <? } ?>

                                </picture>

                                <div hidden>

                                    <div id="video-<?= $arItem['ID']; ?>" class="video popup-video">

                                        <video preload="auto" controls>
                                            <source
                                                src="<?= $arItem['DISPLAY_PROPERTIES']['VIDEO']['VALUE']['path']; ?>">
                                        </video>

                                        <? /*

                                        <button class="transparent button play">
                                            <i class="icon-play"></i>
                                        </button>

                                        <button class="transparent button pause">
                                            <i class="icon-pause"></i>
                                        </button>

                                        */ ?>

                                    </div>

                                </div>


                            </a>

                        </div>

                    </div>

                <? } ?>

            </div>

        </div>

        <? $frame->end(); ?>

    </div>

<? } ?>
