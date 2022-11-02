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

    <div class="reviews--front">

        <? $frame->begin(); ?>

        <div class="wrap">

            <div class="slider items">

                <? foreach ($arResult['ITEMS'] as $i => $arItem) {

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

                    //todo дополнить проверкой года: если не текущий, то выводить
                    //todo обновить

                    $date = CIBlockFormatProperties::DateFormat($arParams["ACTIVE_DATE_FORMAT"], MakeTimeStamp($arItem['DISPLAY_PROPERTIES']['DATE']['VALUE'], CSite::GetDateFormat()));

                    $sku = false;

                    ?>

                    <div class="review item">

                        <div class="header">

                            <div class="author--image">

                                <picture>

                                    <? if (!empty($arItem['DISPLAY_PROPERTIES']['AUTHOR_IMAGE']['VALUE'])) { ?>

                                        <? if ($authorImage['webp_src']) { ?>
                                            <source srcset="<?= $authorImage['webp_src']; ?>"
                                                    type="<?= $authorImage['webp_content_type']; ?>"
                                                    media="<?= Images::getMedia('mobile', true); ?>">
                                        <? } ?>

                                        <source srcset="<?= $authorImage["src"]; ?>"
                                                type="<?= $authorImage['content_type']; ?>"
                                                media="<?= Images::getMedia('mobile', true); ?>">

                                        <img src="<?= $authorImagePreload['src']; ?>"
                                             alt="<?= $arItem['DISPLAY_PROPERTIES']['AUTHOR_NAME']['VALUE']; ?>"
                                             loading="lazy">

                                    <? } else { ?>

                                        <img src="<?= Images::PLACEHOLDER; ?>">

                                    <? } ?>

                                </picture>

                            </div>

                            <div>

                                <div class="author--name">
                                    <?= $arItem['DISPLAY_PROPERTIES']['AUTHOR_NAME']['VALUE']; ?>
                                </div>

                                <? if (!empty($arItem['PROPERTIES']['RATING']['VALUE'])) { ?>

                                    <div class="rating">

                                        <span class="stars">
                                            <? for ($i = 1; $i <= $arParams['RATING_MAX']; $i++) { ?>
                                                <i class="isax star <? if ($i > $arItem['DISPLAY_PROPERTIES']['RATING']['VALUE']) echo ' empty'; ?>"></i>
                                            <? } ?>
                                        </span>

                                        <span class="value"><?= $arItem['DISPLAY_PROPERTIES']['RATING']['VALUE']; ?></span>

                                    </div>

                                <? } ?>

                            </div>

                            <? if (!empty($arItem['PROPERTIES']['DATE']['VALUE'])) { ?>

                                <div class="date">
                                    <?= $date; ?>
                                </div>

                            <? } ?>

                        </div>

                        <? if (!empty($arItem['PROPERTIES']['SKU']['VALUE'])) { ?>
                            <h3><?= $sku['NAME']; ?></h3>
                        <? } ?>

                        <div class="content">
                            <?php

                            $text   = strip_tags($arItem['DETAIL_TEXT']);
                            $length = $arParams['TEXT_LIMIT'];

                            echo Template::mbCutString($text, $length);

                            ?>
                        </div>

                        <? if (!empty($arItem['PROPERTIES']['SKU']['VALUE'])) { ?>
                            <div class="link">
                                <a href="<?= $sku['URL']; ?>"
                                   class="button primary">К товару</a>
                            </div>
                        <? } ?>

                    </div>

                <? } ?>

            </div>

        </div>

        <? $frame->end(); ?>

    </div>

<? } ?>
