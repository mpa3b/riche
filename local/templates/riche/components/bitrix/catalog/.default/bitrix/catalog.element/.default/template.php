<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Riche\Breakpoint;
use Riche\Thumb;
use Riche\Units;

/**
 * @global CMain                 $APPLICATION
 * @var array                    $arParams
 * @var array                    $arResult
 * @var CatalogSectionComponent  $component
 * @var CBitrixComponentTemplate $this
 * @var string                   $templateName
 * @var string                   $componentPath
 * @var string                   $templateFolder
 */

$this->setFrameMode(true);

$this->addExternalJs(LOCAL_ASSETS . '/slick-carousel/slick/slick.js');
$this->addExternalCss(LOCAL_ASSETS . '/slick-carousel/slick/slick.css');
$this->addExternalCss(SITE_TEMPLATE_PATH . '/styles/slick.css');

?>

<article class="catalog--default--element--default"
         data-id="<?= $arResult['ID']; ?>"
         data-section="<?= $arResult['IBLOCK_SECTION_ID']; ?>"
         data-site="<?= SITE_ID; ?>">

    <div class="wrap">

        <section class="section  main row">

            <div class="images half">

                <div class="slider items">

                    <div class="detail-picture item">

                        <?php

                        $image = $arResult['DETAIL_PICTURE']['ID'];

                        $preload = CFile::ResizeImageGet(
                            $image,
                            Thumb::calculateImageSize(Breakpoint::breakpoints['preload'], 0.75),
                            BX_RESIZE_IMAGE_EXACT
                        );

                        $small = CFile::ResizeImageGet(
                            $image,
                            Thumb::calculateImageSize(Breakpoint::breakpoints['small'] / 1, 0.75),
                            BX_RESIZE_IMAGE_EXACT
                        );

                        $mobile = CFile::ResizeImageGet(
                            $image,
                            Thumb::calculateImageSize(Breakpoint::breakpoints['mobile'] / 1, 0.75),
                            BX_RESIZE_IMAGE_EXACT
                        );

                        $tablet = CFile::ResizeImageGet(
                            $image,
                            Thumb::calculateImageSize(Breakpoint::breakpoints['tablet'] / 1, 0.75),
                            BX_RESIZE_IMAGE_EXACT
                        );

                        $desktop = CFile::ResizeImageGet(
                            $image,
                            Thumb::calculateImageSize(Breakpoint::breakpoints['desktop'] / 2, 0.75),
                            BX_RESIZE_IMAGE_EXACT
                        );

                        $wide = CFile::ResizeImageGet(
                            $image,
                            Thumb::calculateImageSize(Breakpoint::breakpoints['wide'] / 2, 0.75),
                            BX_RESIZE_IMAGE_EXACT
                        );

                        ?>

                        <picture>

                            <source data-srcset="<?= $small['src']; ?>"
                                    media="<?= Breakpoint::getMedia('small'); ?>">

                            <source data-srcset="<?= $mobile['src']; ?>"
                                    media="<?= Breakpoint::getMedia('mobile'); ?>">

                            <source data-srcset="<?= $tablet['src']; ?>"
                                    media="<?= Breakpoint::getMedia('tablet'); ?>">

                            <source data-srcset="<?= $desktop['src']; ?>"
                                    media="<?= Breakpoint::getMedia('desktop'); ?>">

                            <source data-srcset="<?= $wide['src']; ?>"
                                    media="<?= Breakpoint::getMedia('wide'); ?>">

                            <img loading="lazy"
                                 data-src="<?= $preload['src']; ?>"
                                 alt="<?= $arResult['NAME']; ?>">

                        </picture>

                    </div>

                    <?php if ($arResult['DISPLAY_PROPERTIES']['VIDEO']) { ?>

                        <div class="video item">

                            <video muted loop>
                                <source data-src="<?= $arResult['DISPLAY_PROPERTIES']['VIDEO']['VALUE']['path']; ?>">
                            </video>

                        </div>

                    <?php } ?>

                    <?php if (!empty($arResult['DISPLAY_PROPERTIES']['IMAGES']['VALUE'])) { ?>

                        <?php $imagesFrame = $this->createFrame(); ?>

                        <?php $imagesFrame->begin(); ?>

                        <?php foreach ($arResult['DISPLAY_PROPERTIES']['IMAGES']['VALUE'] as $image) { ?>

                            <div class="images-property item">

                                <?php

                                $preload = CFile::ResizeImageGet(
                                    $image,
                                    Thumb::calculateImageSize(Breakpoint::breakpoints['preload'], 0.75),
                                    BX_RESIZE_IMAGE_EXACT
                                );

                                $small = CFile::ResizeImageGet(
                                    $image,
                                    Thumb::calculateImageSize(Breakpoint::breakpoints['small'] / 1, 0.75),
                                    BX_RESIZE_IMAGE_EXACT
                                );

                                $mobile = CFile::ResizeImageGet(
                                    $image,
                                    Thumb::calculateImageSize(Breakpoint::breakpoints['mobile'] / 1, 0.75),
                                    BX_RESIZE_IMAGE_EXACT
                                );

                                $tablet = CFile::ResizeImageGet(
                                    $image,
                                    Thumb::calculateImageSize(Breakpoint::breakpoints['tablet'] / 1, 0.75),
                                    BX_RESIZE_IMAGE_EXACT
                                );

                                $desktop = CFile::ResizeImageGet(
                                    $image,
                                    Thumb::calculateImageSize(Breakpoint::breakpoints['desktop'] / 2, 0.75),
                                    BX_RESIZE_IMAGE_EXACT
                                );

                                $wide = CFile::ResizeImageGet(
                                    $image,
                                    Thumb::calculateImageSize(Breakpoint::breakpoints['wide'] / 2, 0.75),
                                    BX_RESIZE_IMAGE_EXACT
                                );

                                ?>

                                <picture>

                                    <source data-srcset="<?= $small['src']; ?>"
                                            media="<?= Breakpoint::getMedia('small'); ?>">

                                    <source data-srcset="<?= $mobile['src']; ?>"
                                            media="<?= Breakpoint::getMedia('mobile'); ?>">

                                    <source data-srcset="<?= $tablet['src']; ?>"
                                            media="<?= Breakpoint::getMedia('tablet'); ?>">

                                    <source data-srcset="<?= $desktop['src']; ?>"
                                            media="<?= Breakpoint::getMedia('desktop'); ?>">

                                    <source data-srcset="<?= $wide['src']; ?>"
                                            media="<?= Breakpoint::getMedia('wide'); ?>">

                                    <img loading="lazy"
                                         data-src="<?= $preload['src']; ?>"
                                         alt="<?= $arResult['NAME']; ?>">

                                </picture>

                            </div>

                        <?php } ?>

                        <?php $imagesFrame->end(); ?>

                    <?php } ?>

                </div>

                <button class="prev button transparent">
                    <i class="icon-chevron-left"></i>
                </button>

                <button class="next button transparent">
                    <i class="icon-chevron-right"></i>
                </button>

            </div>

            <div class="half">

                <div class="product-description">

                    <h1><?= $arResult['NAME']; ?></h1>

                    <?php if (!empty($arResult['DISPLAY_PROPERTIES']['SHORT_DESCRIPTION']['VALUE'])) { ?>

                        <div class="short-description">

                            <p><?= $arResult['DISPLAY_PROPERTIES']['SHORT_DESCRIPTION']['VALUE']; ?></p>

                        </div>

                    <?php } ?>

                    <?php if ($arResult['REVIEWS']) { ?>

                        <div class="reviews">

                            <div class="stars">
                                <?php for ($i = 1; $i <= $arResult['REVIEWS']['MAX']; $i++) { ?>
                                    <i class="icon-star"></i>
                                <? } ?>
                            </div>

                            <span class="value"><?= $arResult['REVIEWS']['MEDIAN']; ?></span>
                            <span class="count"><?= Units::plural($arResult['REVIEWS']['COUNT'], 'отзыв') ?></span>

                        </div>

                    <?php } ?>

                    <?php if ($arResult['PRODUCT']['AVAILABLE']) { ?>

                        <div class="available">

                            <i class="icon-check-circle-1"></i>
                            <span>в наличии</span>

                        </div>

                    <?php } ?>

                    <?php if (!empty($arResult['PREVIEW_TEXT'])) { ?>

                        <div class="description">
                            <p><?= $arResult['PREVIEW_TEXT']; ?></p>
                        </div>

                    <?php } ?>

                    <?php if (!empty($arResult['CAN_BUY'])) { ?>

                        <div class="product">

                            <?php if ($arResult['ITEM_PRICES_CAN_BUY']) { ?>

                                <div class="prices">

                                    <?php foreach ($arResult['ITEM_PRICES'] as $arPrice) { ?>

                                        <div class="price <?= strtolower($arPrice['CODE']); ?>">

                                            <?php if ($arPrice['DISCOUNT'] > 0) { ?>
                                                <del class="old price"><?= $arPrice['PRINT_BASE_PRICE']; ?></del>
                                                <span class="discount price"><?= $arPrice['PRINT_PRICE']; ?></span>
                                            <?php } else { ?>
                                                <span class="price"><?= $arPrice['PRINT_PRICE']; ?></span>
                                            <?php } ?>

                                            <?php if ($arPrice['PERCENT'] !== 0) { ?>
                                                <span class="percent"><?= $arPrice['PERCENT']; ?></span>
                                            <?php } ?>

                                        </div>

                                    <?php } ?>

                                </div>

                            <?php } ?>

                            <div class="actions">

                                <?php if ($arParams['USE_QUANTITY']) { ?>

                                    <input type="number"
                                           name="quantity"
                                           step="1"
                                           max="<?= $arResult['PRODUCT']['QUANTITY']; ?>">

                                <?php } ?>

                                <button class="big primary buy button"
                                        data-quantity=""
                                        <?php if (!$arResult['CAN_BUY']) { ?>disabled<?php } ?>
                                        data-id="<?= $arResult['ID']; ?>"
                                        data-action="buy">

                                    <i class="icon-shopping-cart"></i>
                                    Добавить в корзину

                                </button>

                            </div>

                        </div>

                    <?php } ?>

                    <div class="buttons">

                        <button class="share button"
                                data-action="share">

                            <i class="icon-share"></i>
                            Поделиться

                        </button>

                        <button class="favorite button"
                                data-id="<?= $arResult['ID']; ?>"
                                data-action="favorite">

                            <i class="icon-heart"></i>
                            В избранное

                        </button>

                    </div>


                </div>

            </div>

        </section>

        <?php if ($arResult['DISPLAY_PROPERTIES']['HOW_TO_USE']) { ?>

            <?php $howToUseFrame = $this->createFrame(); ?>

            <section class="section how-to-use row">

                <?php $howToUseFrame->begin(); ?>

                <div class="whole">

                    <h2>Как использовать</h2>

                    <div class="row">

                        <?php /*

                            <?php if ($arResult['DISPLAY_PROPERTIES']['HOW_TO_USE_VIDEO']) { ?>

                                <div class="how-to-use--video third">

                                    <div class="video-wrapper">

                                        <video id="how-to-use-video" muted>
                                            <source data-src="<?= $arResult['DISPLAY_PROPERTIES']['HOW_TO_USE_VIDEO']['VALUE']['path']; ?>">
                                        </video>

                                    </div>

                                </div>

                            <?php } ?>

                            */ ?>

                        <?php if ($arResult['DISPLAY_PROPERTIES']['HOW_TO_USE']) { ?>

                            <div class="how-to-use--instruction half">

                                <div class="slider items">

                                    <?php foreach ($arResult['DISPLAY_PROPERTIES']['HOW_TO_USE']['DISPLAY_VALUE'] as $howto) { ?>
                                        <div class="item"><?= $howto; ?></div>
                                    <?php } ?>

                                </div>

                            </div>

                        <?php } ?>

                        <?php if ($arResult['DISPLAY_PROPERTIES']['HOW_TO_USE_IMAGES']) { ?>

                            <div class="how-to-use--images half">

                                <div class="images slider items">

                                    <?php foreach ($arResult['DISPLAY_PROPERTIES']['HOW_TO_USE_IMAGES']['VALUE'] as $image) { ?>

                                        <div class="item">

                                            <?php

                                            $preload = CFile::ResizeImageGet(
                                                $image,
                                                Thumb::calculateImageSize(Breakpoint::breakpoints['preload'], 1),
                                                BX_RESIZE_IMAGE_EXACT
                                            );

                                            $small = CFile::ResizeImageGet(
                                                $image,
                                                Thumb::calculateImageSize(Breakpoint::breakpoints['small'] / 1, 1),
                                                BX_RESIZE_IMAGE_EXACT
                                            );

                                            $mobile = CFile::ResizeImageGet(
                                                $image,
                                                Thumb::calculateImageSize(Breakpoint::breakpoints['mobile'] / 1, 1),
                                                BX_RESIZE_IMAGE_EXACT
                                            );

                                            $tablet = CFile::ResizeImageGet(
                                                $image,
                                                Thumb::calculateImageSize(Breakpoint::breakpoints['tablet'] / 1, 1),
                                                BX_RESIZE_IMAGE_EXACT
                                            );

                                            $desktop = CFile::ResizeImageGet(
                                                $image,
                                                Thumb::calculateImageSize(Breakpoint::breakpoints['desktop'] / 2, 1),
                                                BX_RESIZE_IMAGE_EXACT
                                            );

                                            $wide = CFile::ResizeImageGet(
                                                $image,
                                                Thumb::calculateImageSize(Breakpoint::breakpoints['wide'] / 2, 1),
                                                BX_RESIZE_IMAGE_EXACT
                                            );

                                            ?>

                                            <picture>

                                                <source data-srcset="<?= $small['src']; ?>"
                                                        media="<?= Breakpoint::getMedia('small'); ?>">

                                                <source data-srcset="<?= $mobile['src']; ?>"
                                                        media="<?= Breakpoint::getMedia('mobile'); ?>">

                                                <source data-srcset="<?= $tablet['src']; ?>"
                                                        media="<?= Breakpoint::getMedia('tablet'); ?>">

                                                <source data-srcset="<?= $desktop['src']; ?>"
                                                        media="<?= Breakpoint::getMedia('desktop'); ?>">

                                                <source data-srcset="<?= $wide['src']; ?>"
                                                        media="<?= Breakpoint::getMedia('wide'); ?>">

                                                <img data-src="<?= $preload['src']; ?>"
                                                     loading="lazy"
                                                     alt="<?= $arResult['NAME']; ?>">

                                            </picture>

                                        </div>

                                    <?php } ?>

                                </div>

                            </div>

                        <?php } ?>

                    </div>

                </div>

                <?php $howToUseFrame->end(); ?>

            </section>

        <?php } ?>

        <?php if ($arResult['DISPLAY_PROPERTIES']['KEY_INGREDIENTS']) { ?>

            <?php $keyIngredientsFrame = $this->createFrame(); ?>

            <section class="section key-ingredients row">

                <?php $keyIngredientsFrame->begin(); ?>

                <div class="whole">

                    <div class="wrapper well">

                        <h2>Ключевые ингредиенты</h2>

                        <ul>
                            <?php foreach ($arResult['DISPLAY_PROPERTIES']['KEY_INGREDIENTS']['VALUE'] as $arKeyIngredient) { ?>
                                <li>
                                    <h3><?= $arKeyIngredient['NAME']; ?></h3>
                                    <p><?= $arKeyIngredient['PREVIEW_TEXT']; ?></p>
                                </li>
                            <?php } ?>
                        </ul>

                    </div>

                </div>

                <?php $keyIngredientsFrame->end(); ?>

            </section>

        <?php } ?>

        <?php if ($arResult['DISPLAY_PROPERTIES']['INGREDIENTS']) { ?>

            <?php $ingredientsFrame = $this->createFrame(); ?>

            <section class="section ingredients row">

                <?php $ingredientsFrame->begin(); ?>

                <div class="whole">

                    <h2>Cостав</h2>

                    <ul>
                        <?php foreach ($arResult['DISPLAY_PROPERTIES']['INGREDIENTS']['DESCRIPTION'] as $i => $name) { ?>
                            <li>
                                <span class="name"><?= $name; ?></span>
                                <?php if ($arResult['DISPLAY_PROPERTIES']['INGREDIENTS']['VALUE'][$i]) { ?>
                                    <span class="percent"><?= $arResult['DISPLAY_PROPERTIES']['INGREDIENTS']['VALUE'][$i]; ?>%</span>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    </ul>

                </div>

                <?php $ingredientsFrame->end(); ?>

            </section>

        <?php } ?>

    </div>

</article>
