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
         data-section="<?= $arResult['IBLOCK_SECTION_ID'] ?>">

    <div class="wrap">

        <? $frame->begin(); ?>

        <div class="row">

            <div class="images three-fifths">

                <?php

                $image = $arResult['DETAIL_PICTURE']['ID'];

                $preload = CFile::ResizeImageGet(
                    $image,
                    Thumb::calculateImageSize(Breakpoint::breakpoints['preload'], 1),
                    BX_RESIZE_IMAGE_EXACT
                );

                $small = CFile::ResizeImageGet(
                    $image,
                    Thumb::calculateImageSize(Breakpoint::breakpoints['small'] / 2, 1.5),
                    BX_RESIZE_IMAGE_EXACT
                );

                $mobile = CFile::ResizeImageGet(
                    $image,
                    Thumb::calculateImageSize(Breakpoint::breakpoints['mobile'] / 3, 1.5),
                    BX_RESIZE_IMAGE_EXACT
                );

                $tablet = CFile::ResizeImageGet(
                    $image,
                    Thumb::calculateImageSize(Breakpoint::breakpoints['tablet'] / 3, 1.5),
                    BX_RESIZE_IMAGE_EXACT
                );

                $desktop = CFile::ResizeImageGet(
                    $image,
                    Thumb::calculateImageSize(Breakpoint::breakpoints['desktop'] / 4, 1.5),
                    BX_RESIZE_IMAGE_EXACT
                );

                $wide = CFile::ResizeImageGet(
                    $image,
                    Thumb::calculateImageSize(Breakpoint::breakpoints['wide'] / 4, 1.5),
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

                    <video <?php if ($i == 0) { ?>autoplay<?php } ?> muted loop>
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
                            Thumb::calculateImageSize(Breakpoint::breakpoints['small'] / 2, 1.5),
                            BX_RESIZE_IMAGE_EXACT
                        );

                        $mobile = CFile::ResizeImageGet(
                            $image,
                            Thumb::calculateImageSize(Breakpoint::breakpoints['mobile'] / 3, 1.5),
                            BX_RESIZE_IMAGE_EXACT
                        );

                        $tablet = CFile::ResizeImageGet(
                            $image,
                            Thumb::calculateImageSize(Breakpoint::breakpoints['tablet'] / 3, 1.5),
                            BX_RESIZE_IMAGE_EXACT
                        );

                        $desktop = CFile::ResizeImageGet(
                            $image,
                            Thumb::calculateImageSize(Breakpoint::breakpoints['desktop'] / 4, 1.5),
                            BX_RESIZE_IMAGE_EXACT
                        );

                        $wide = CFile::ResizeImageGet(
                            $image,
                            Thumb::calculateImageSize(Breakpoint::breakpoints['wide'] / 4, 1.5),
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

            <div class="two-fifths">

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

        <?php if ($arResult['DISPLAY_PROPERTIES']['USAGE']) { ?>

            <div class="usage">
                <?php print $arResult['DISPLAY_PROPERTIES']['USAGE']; ?>
            </div>

        <?php } ?>

        <?php if ($arResult['DISPLAY_PROPERTIES']['INGREDIENTS']) { ?>

            <div class="ingredients">

            </div>

        <?php } ?>

        <div class="contents">

        </div>

        <div class="reviews">

        </div>

        <?php d($arResult); ?>

        <? $frame->beginStub(); ?>

        <? $frame->end(); ?>

    </div>

</article>
