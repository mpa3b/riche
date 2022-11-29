<?php

use Riche\Breakpoint;
use Riche\Thumb;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

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

$frame = $this->createFrame();

?>

<article class="catalog--default--element--default"
         data-id="<?= $arResult['ID']; ?>"
         data-section="<?= $arResult['IBLOCK_SECTION_ID']; ?>"
         data-site="<?= SITE_ID; ?>">

    <div class="wrap">

        <? $frame->begin(); ?>

        <div class="row">

            <div class="image three-fifths">

                <div class="slider items">

                    <?php

                    $image = $arResult['DETAIL_PICTURE']['ID'];

                    $preload = CFile::ResizeImageGet(
                        $image,
                        Thumb::calculateImageSize(Breakpoint::breakpoints['preload'], 1),
                        BX_RESIZE_IMAGE_EXACT
                    );

                    $small = CFile::ResizeImageGet(
                        $image,
                        Thumb::calculateImageSize(Breakpoint::breakpoints['small'] / 1, 1.25),
                        BX_RESIZE_IMAGE_EXACT
                    );

                    $mobile = CFile::ResizeImageGet(
                        $image,
                        Thumb::calculateImageSize(Breakpoint::breakpoints['mobile'] / 1, 1.25),
                        BX_RESIZE_IMAGE_EXACT
                    );

                    $tablet = CFile::ResizeImageGet(
                        $image,
                        Thumb::calculateImageSize(Breakpoint::breakpoints['tablet'] / 1, 1.5),
                        BX_RESIZE_IMAGE_EXACT
                    );

                    $desktop = CFile::ResizeImageGet(
                        $image,
                        Thumb::calculateImageSize(Breakpoint::breakpoints['desktop'] / 2, 1.75),
                        BX_RESIZE_IMAGE_EXACT
                    );

                    $wide = CFile::ResizeImageGet(
                        $image,
                        Thumb::calculateImageSize(Breakpoint::breakpoints['wide'] / 2, 1.75),
                        BX_RESIZE_IMAGE_EXACT
                    );

                    ?>

                    <picture class="detail-picture image">

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

                    <?php if ($arResult['DISPLAY_PROPERTIES']['VIDEO']) { ?>

                        <video muted loop>
                            <source data-src="<?= $arResult['DISPLAY_PROPERTIES']['VIDEO']['VALUE']['path']; ?>">
                        </video>

                    <?php } ?>

                    <?php if (!empty($arResult['DISPLAY_PROPERTIES']['IMAGES']['VALUE'])) { ?>

                        <?php foreach ($arResult['DISPLAY_PROPERTIES']['IMAGES']['VALUE'] as $image) { ?>

                            <?php

                            $preload = CFile::ResizeImageGet(
                                $image,
                                Thumb::calculateImageSize(Breakpoint::breakpoints['preload'], 1),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $small = CFile::ResizeImageGet(
                                $image,
                                Thumb::calculateImageSize(Breakpoint::breakpoints['small'] / 1, 1.25),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $mobile = CFile::ResizeImageGet(
                                $image,
                                Thumb::calculateImageSize(Breakpoint::breakpoints['mobile'] / 1, 1.25),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $tablet = CFile::ResizeImageGet(
                                $image,
                                Thumb::calculateImageSize(Breakpoint::breakpoints['tablet'] / 1, 1.5),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $desktop = CFile::ResizeImageGet(
                                $image,
                                Thumb::calculateImageSize(Breakpoint::breakpoints['desktop'] / 2, 1.75),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $wide = CFile::ResizeImageGet(
                                $image,
                                Thumb::calculateImageSize(Breakpoint::breakpoints['wide'] / 2, 1.75),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            ?>

                            <picture class="images-property image">

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

                        <?php } ?>

                    <?php } ?>

                </div>

            </div>

            <div class="product two-fifths">

                <div class="wrapper">

                    <?php if (!empty($arResult['ITEM_PRICES'])) { ?>

                        <div class="prices">

                            <?php foreach ($arResult['ITEM_PRICES'] as $arPrice) { ?>

                                <div class="price <?= strtolower($arPrice['CODE']); ?>">

                                    <?php if ($arPrice['DISCOUNT'] > 0) { ?>
                                        <del class="old price"><?= $arPrice['PRINT_BASE_PRICE']; ?></del>
                                        <span class="discount price"><?= $arPrice['PRINT_PRICE']; ?></span>
                                    <?php } else { ?>
                                        <span class="price"><?= $arPrice['PRINT_PRICE']; ?></span>
                                    <?php } ?>

                                </div>

                            <?php } ?>

                        </div>

                    <?php } ?>

                    <?php if (!empty($arResult['PREVIEW_TEXT'])) { ?>

                        <div class="description">

                            <h2>Описание</h2>

                            <p><?php print $arResult['PREVIEW_TEXT']; ?></p>

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
                            <span>Добавить в корзину</span>
                        </button>

                        <button class="share button"
                                data-id="<?= $arResult['ID']; ?>"
                                data-action="share">
                            <i class="icon-share"></i>
                            <span>Поделиться</span>
                        </button>

                        <button class="favorite button"
                                data-id="<?= $arResult['ID']; ?>"
                                data-action="favorite">
                            <i class="icon-heart"></i>
                            <span>В избранное</span>
                        </button>

                    </div>

                </div>

            </div>

        </div>

        <?php if ($arResult['DISPLAY_PROPERTIES']['HOW_TO_USE']) { ?>

            <section class="usage">

                <div class="wrapper">

                    <?php if ($arResult['DISPLAY_PROPERTIES']['HOW_TO_USE_VIDEO']) { ?>

                        <video muted>
                            <source data-src="<?= $arResult['DISPLAY_PROPERTIES']['HOW_TO_USE_VIDEO']['VALUE']['path']; ?>">
                        </video>

                    <?php } ?>

                    <h2>Как использовать</h2>

                    <div class="text">
                        <?= html_entity_decode($arResult['DISPLAY_PROPERTIES']['HOW_TO_USE']['VALUE']['TEXT']); ?>
                    </div>

                </div>

            </section>

        <?php } ?>

        <?php if ($arResult['DISPLAY_PROPERTIES']['KEY_INGREDIENTS']) { ?>

            <section class="ingredients">

                <h2>Ключевые ингредиенты</h2>

                <ul>

                    <? foreach ($arResult['DISPLAY_PROPERTIES']['KEY_INGREDIENTS']['VALUE'] as $arKeyIngredient) { ?>

                        <li>

                            <h3><?= $arKeyIngredient['NAME']; ?></h3>

                            <p><?= $arKeyIngredient['PREVIEW_TEXT']; ?></p>

                        </li>

                    <? } ?>

                </ul>

            </section>

        <?php } ?>

        <?php if ($arResult['DISPLAY_PROPERTIES']['INGREDIENTS']) { ?>

            <section class="contents">

                <h2>Cостав</h2>

                <ul>

                    <? foreach ($arResult['DISPLAY_PROPERTIES']['INGREDIENTS']['DESCRIPTION'] as $i => $name) { ?>
                        <li>
                            <span class="name"><?= $name; ?></span>
                            <? if ($arResult['DISPLAY_PROPERTIES']['INGREDIENTS']['VALUE'][$i]) { ?>
                                <span class="percent"><?= $arResult['DISPLAY_PROPERTIES']['INGREDIENTS']['VALUE'][$i]; ?></span>
                            <? } ?>
                        </li>
                    <? } ?>

                </ul>

            </section>

        <?php } ?>

        <? $frame->beginStub(); ?>

        <? $frame->end(); ?>

    </div>

</article>
