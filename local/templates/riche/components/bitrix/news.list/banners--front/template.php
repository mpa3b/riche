<?php use Riche\Breakpoint;
use Riche\Thumb;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var array $templateData */
/** @var CBitrixComponent $component */

$this->setFrameMode(true);

$this->addExternalJs(LOCAL_ASSETS . '/slick-carousel/slick/slick.js');
$this->addExternalCss(LOCAL_ASSETS . '/slick-carousel/slick/slick.css');
$this->addExternalCss(SITE_TEMPLATE_PATH . '/styles/slick.css');

$ratios = [
    'small'   => 2,
    'mobile'  => 2,
    'tablet'  => 1 / 1.5,
    'desktop' => 1 / 1.5,
    'wide'    => 1 / 2,
];

?>

<?php if (!empty($arResult['ITEMS'])) { ?>

    <nav class="banners--front">

        <?php

        $frame = $this->createFrame();

        $frame->begin();

        ?>

        <div class="wrap">

            <h2 hidden>Самое главное</h2>

            <div class="items slider">

                <?php foreach ($arResult['ITEMS'] as $i => $arItem) { ?>

                    <div class="item">

                        <?php if (!empty($arItem['DISPLAY_PROPERTIES']['VIDEO']['VALUE'])) { ?>

                            <video muted loop autoplay>
                                <source data-src="<?= $arItem['DISPLAY_PROPERTIES']['VIDEO']['VALUE']['path']; ?>">
                            </video>

                        <?php } ?>

                        <?php if ($arItem['DETAIL_PICTURE']) { ?>

                            <?php

                            $preload = CFile::ResizeImageGet(
                                $arItem['DETAIL_PICTURE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['preload'], 0.5),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $small = CFile::ResizeImageGet(
                                $arItem['DETAIL_PICTURE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['small'], 0.5),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $mobile = CFile::ResizeImageGet(
                                $arItem['DETAIL_PICTURE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['mobile'], 0.5),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $tablet = CFile::ResizeImageGet(
                                $arItem['DETAIL_PICTURE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['tablet'], 3),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $desktop = CFile::ResizeImageGet(
                                $arItem['DETAIL_PICTURE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['desktop'], 4),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $wide = CFile::ResizeImageGet(
                                $arItem['DETAIL_PICTURE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['wide'], 5),
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
                                <source data-srcset="<?= $wide['src']; ?>" media="<?= Breakpoint::getMedia('wide'); ?>">

                                <?php if ($i == 0) { ?>
                                    <img src="<?= $preload['src']; ?>" alt="<?= $arItem['NAME']; ?>" loading="eager">
                                <?php } else { ?>
                                    <img data-src="<?= $preload['src']; ?>" alt="<?= $arItem['NAME']; ?>"
                                         loading="lazy">
                                <?php } ?>

                            </picture>

                        <?php } ?>

                        <div class="details">

                            <h3><?= $arItem['NAME']; ?></h3>

                            <?php if (!empty($arItem['PREVIEW_TEXT'])) { ?>
                                <p><?= $arItem['PREVIEW_TEXT']; ?></p>
                            <?php } ?>

                            <?php if (!empty($arItem['DISPLAY_PROPERTIES']['LINK']['VALUE'])) { ?>

                                <button class="big white button"
                                        data-id="<?= $arItem['ID']; ?>"
                                        data-href="<?= $arItem['DISPLAY_PROPERTIES']['LINK']['VALUE']; ?>">
                                    <?= $arItem['DISPLAY_PROPERTIES']['BUTTON_TEXT']['VALUE']; ?>
                                    <i class="icon-chevron-right"></i>
                                </button>

                            <?php } ?>

                        </div>

                    </div>

                <?php } ?>

            </div>

        </div>

        <?php

        $frame->end();

        ?>

    </nav>

<?php } ?>
