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

                    <div class="review">

                        <div class="header">

                            <div>

                                <div class="author">

                                    <?php

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

                                        <?php if (!empty($arItem['DISPLAY_PROPERTIES']['AUTHOR_IMAGE']['VALUE'])) { ?>

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

                                        <?php } else { ?>

                                            <img src="<?php echo Images::PLACEHOLDER; ?>">

                                        <? } ?>


                                    </picture>

                                    <span class="author--name">
                                        <?php echo $arItem['DISPLAY_PROPERTIES']['AUTHOR_NAME']['VALUE']; ?>
                                    </span>

                                </div>

                                <?php if (!empty($arItem['PROPERTIES']['RATING']['VALUE'])) { ?>

                                    <div class="rating">

                                    <span class="stars"
                                          data-rating="<?php echo $arItem['DISPLAY_PROPERTIES']['RATING']['VALUE']; ?>">

                                        <? for($i = 1; $i <= $arParams['RATING_MAX']; $i++) { ?>
                                            <i class="icon star<?php if($i > $arItem['DISPLAY_PROPERTIES']['RATING']['VALUE'] ) echo ' empty'; ?>" data-i="<?php echo $i; ?>"></i>
                                        <?php } ?>

                                    </span>

                                    </div>

                                <?php } ?>

                            </div>

                            <?php if (!empty($arItem['PROPERTIES']['DATE']['VALUE'])) { ?>

                                <?php //todo дополнить проверкой года: если не текущий, то выводить ?>
                                <?php //todo обновить ?>

                                <div class="date">
                                    <?php echo CIBlockFormatProperties::DateFormat($arParams["ACTIVE_DATE_FORMAT"], MakeTimeStamp($arItem['DISPLAY_PROPERTIES']['DATE']['VALUE'], CSite::GetDateFormat())); ?>
                                </div>

                            <?php } ?>

                        </div>

                        <div class="content">
                            <?php echo $arItem['DETAIL_TEXT']; ?>
                        </div>

                    </div>

                <?php } ?>

            </div>

        </div>

        <?php $frame->end(); ?>

    </div>

    <?php d($arResult); ?>

<?php } ?>
