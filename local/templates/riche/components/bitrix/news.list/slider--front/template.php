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

$frame = $this->createFrame();

$ratios = [
    'small'   => 2,
    'mobile'  => 2,
    'tablet'  => 1 / 1.5,
    'desktop' => 1 / 1.5,
    'wide'    => 1 / 2,
];

?>

<?php if (!empty($arResult['ITEMS'])) { ?>

    <section class="slider--front">

        <? $frame->begin(); ?>

        <div class="wrap">

            <h2 hidden>Самое главное</h2>

            <div class="items slider">

                <? foreach ($arResult['ITEMS'] as $i => $arItem) { ?>

                    <div class="item">

                        <? if ($arItem['DISPLAY_PROPERTIES']['VIDEO']) { ?>

                            <video muted loop>
                                <source data-src="<?= $arItem['DISPLAY_PROPERTIES']['VIDEO']['VALUE']['path']; ?>">
                            </video>

                        <? } ?>

                        <? if ($arItem['DETAIL_PICTURE']) { ?>

                            <?

                            $preload = CFile::ResizeImageGet(
                                $arItem['DETAIL_PICTURE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['preload'], 0.6),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $small = CFile::ResizeImageGet(
                                $arItem['DETAIL_PICTURE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['small'], 0.6),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $mobile = CFile::ResizeImageGet(
                                $arItem['DETAIL_PICTURE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['mobile'], 0.6),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $tablet = CFile::ResizeImageGet(
                                $arItem['DETAIL_PICTURE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['tablet'] / 2, 0.6),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $desktop = CFile::ResizeImageGet(
                                $arItem['DETAIL_PICTURE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['desktop'] / 3, 0.6),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $wide = CFile::ResizeImageGet(
                                $arItem['DETAIL_PICTURE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['wide'] / 4, 0.6),
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

                                <? if ($i == 0) { ?>

                                    <img data-src="<?= $preload['src']; ?>"
                                         alt="<?= $arItem['NAME']; ?>"
                                         loading="eager">

                                <? } else { ?>

                                    <img data-src="<?= $preload['src']; ?>"
                                         alt="<?= $arItem['NAME']; ?>"
                                         loading="lazy">

                                <? } ?>

                            </picture>

                        <? } ?>

                        <div class="details">

                            <h3><?= $arItem['NAME']; ?></h3>

                            <? if (!empty($arItem['DISPLAY_PROPERTIES']['BUTTON_LINK']['VALUE'])) { ?>

                                <button class="big outlined button"
                                        data-id="<?= $arItem['ID']; ?>"
                                        data-href="<?= $arItem['DISPLAY_PROPERTIES']['BUTTON_LINK']['VALUE']; ?>">
                                    <?= $arItem['DISPLAY_PROPERTIES']['BUTTON_TEXT']['VALUE']; ?>
                                    <i class="icon-chevron-right"></i>
                                </button>

                            <? } ?>

                        </div>

                    </div>

                <?php } ?>

            </div>

        </div>

        <? $frame->end(); ?>

    </section>

<?php } ?>
