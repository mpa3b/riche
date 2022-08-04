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

<? if (!empty($arResult['ITEMS'])) { ?>

    <div class="brand--front--slider">

        <? $frame->begin(); ?>

        <div class="wrap">

            <div class="row">

                <div class="caption third">

                    <? $APPLICATION->IncludeComponent(
                        'bitrix:main.include',
                        '',
                        [
                            "AREA_FILE_SHOW"      => "sect",
                            "AREA_FILE_SUFFIX"    => "brand",
                            "AREA_FILE_RECURSIVE" => "N",

                            "COMPOSITE_FRAME_MODE" => "A",
                            "COMPOSITE_FRAME_TYPE" => "AUTO",
                        ],
                        false
                    ); ?>

                </div>

                <div class="details two-thirds">

                    <div class="slider items">

                        <? foreach ($arResult['ITEMS'] as $i => $arItem) {

                            $imageMobile = CFile::ResizeImageGet(
                                $arItem['DETAIL_PICTURE'],
                                Images::calculateImageSize(Images::BREAKPOINTS['mobile'], 1),
                                BX_RESIZE_IMAGE_EXACT,
                                false,
                                [],
                                false
                            );

                            $image = CFile::ResizeImageGet(
                                $arItem['DETAIL_PICTURE'],
                                Images::calculateImageSize(360, 0.77),
                                BX_RESIZE_IMAGE_EXACT,
                                false,
                                [],
                                false
                            );

                            Images::getWebP($imageMobile);

                            Images::getWebP($image);

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

                                    <picture>

                                        <? if (!empty($arItem['DETAIL_PICTURE'])) { ?>

                                            <? if ($imageMobile['webp_src']) { ?>
                                                <source srcset="<?= $imageMobile['webp_src']; ?>"
                                                        type="<?= $imageMobile['webp_content_type']; ?>"
                                                        media="<?= Images::getMedia('mobile', true); ?>">
                                            <? } ?>

                                            <source srcset="<?= $imageMobile["src"]; ?>"
                                                    type="<?= $imageMobile['content_type']; ?>"
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

                                            <img src="<?= Images::PLACEHOLDER; ?>">

                                        <? } ?>

                                    </picture>

                                    <div class="caption">

                                        <h3><?= $arItem['NAME']; ?></h3>

                                        <? if (!empty($arItem['PREVIEW_TEXT'])) { ?>
                                            <p><?= $arItem['PREVIEW_TEXT']; ?></p>
                                        <? } ?>

                                        <? if (!empty($arItem['DETAIL_PAGE_URL'])) { ?>
                                            <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>"
                                               class="button primary">Подробнее</a>
                                        <? } ?>

                                    </div>

                                </div>

                            </div>

                        <? } ?>

                    </div>

                </div>

            </div>

        </div>

        <? $frame->end(); ?>

    </div>

<? } ?>
