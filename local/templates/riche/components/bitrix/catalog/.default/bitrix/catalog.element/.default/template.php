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

                    <?php if (!empty($arResult['DESCRIPTION'])) { ?>
                        <div class="description">
                            <?php print $arResult['DESCRIPTION']; ?>
                        </div>
                    <?php } ?>

                    <div class="actions">

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

                        <?php if ($arParams['USE_QUANTITY']) { ?>
                            <input type="number"
                                   name="quantity"
                                   step="1"
                                   max="<?= $arResult['PRODUCT']['QUANTITY']; ?>">
                        <?php } ?>

                        <button class="primary buy button"
                                data-quantity=""
                                <?php if (!$arResult['CAN_BUY']) { ?>disabled<?php } ?>
                                data-id="<?= $arResult['ID']; ?>"
                                data-action="buy">
                            <i class="icon-shopping-cart"></i>
                            <span>Добавить в корзину</span>
                        </button>

                    </div>

                </div>

            </div>

        </div>

        <?php if ($arResult['DISPLAY_PROPERTIES']['USAGE']) { ?>

            <section class="usage">
                <?php print $arResult['DISPLAY_PROPERTIES']['USAGE']; ?>
            </section>

        <?php } ?>

        <?php if ($arResult['DISPLAY_PROPERTIES']['INGREDIENTS']) { ?>

            <section class="ingredients">

            </section>

        <?php } ?>

        <?php if ($arResult['DISPLAY_PROPERTIES']['CONTENTS']) { ?>

        <section class="contents">

        </section>

        <?php } ?>

        <?php if ($arResult['DISPLAY_PROPERTIES']['REVIEWS']) { ?>

        <div class="reviews">

        </div>

        <?php } ?>

        <?php d($arResult); ?>

        <? $frame->beginStub(); ?>

        <? $frame->end(); ?>

    </div>

</article>
