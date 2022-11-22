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

    <section class="cta--front">

        <? $frame->begin(); ?>

        <div class="wrap">

            <h2 hidden>Узнай больше</h2>

            <div class="items slider">

                <? foreach ($arResult['ITEMS'] as $arItem) { ?>

                    <div class="item">

                        <picture>

                            <? if ($arItem['DISPLAY_PROPERTIES']['ILLUSTRATION']['FILE_VALUE']['CONTENT_TYPE'] == 'image/svg+xml') { ?>

                                <img src="<?= $arItem['DISPLAY_PROPERTIES']['ILLUSTRATION']['FILE_VALUE']['SRC']; ?>"
                                     alt="<?= $arItem['NAME']; ?>"
                                     class="illustration"
                                     loading="lazy">

                            <? } else { ?>

                                <? if (!empty($arItem['DISPLAY_PROPERTIES']['ILLUSTRATION']['FILE_VALUE'])) { ?>

                                    <? $fileId = $arItem['DISPLAY_PROPERTIES']['ILLUSTRATION']['FILE_VALUE']; ?>

                                <? } else { ?>

                                    <? $fileId = $arItem['DETAIL_PICTURE']['ID']; ?>

                                <? } ?>

                                <? if ($fileId) { ?>

                                    <?

                                    $preload = CFile::ResizeImageGet(
                                        $fileId,
                                        Thumb::calculateImageSize(Breakpoint::breakpoints['preload'], 1),
                                        BX_RESIZE_IMAGE_EXACT
                                    );

                                    $small = CFile::ResizeImageGet(
                                        $fileId,
                                        Thumb::calculateImageSize(Breakpoint::breakpoints['small'], 1),
                                        BX_RESIZE_IMAGE_EXACT
                                    );

                                    $mobile = CFile::ResizeImageGet(
                                        $fileId,
                                        Thumb::calculateImageSize(Breakpoint::breakpoints['mobile'], 1),
                                        BX_RESIZE_IMAGE_EXACT
                                    );

                                    $tablet = CFile::ResizeImageGet(
                                        $fileId,
                                        Thumb::calculateImageSize(Breakpoint::breakpoints['tablet'] / 2, 1),
                                        BX_RESIZE_IMAGE_EXACT
                                    );

                                    $desktop = CFile::ResizeImageGet(
                                        $fileId,
                                        Thumb::calculateImageSize(Breakpoint::breakpoints['desktop'] / 3, 1),
                                        BX_RESIZE_IMAGE_EXACT
                                    );

                                    $wide = CFile::ResizeImageGet(
                                        $fileId,
                                        Thumb::calculateImageSize(Breakpoint::breakpoints['wide'] / 4, 1),
                                        BX_RESIZE_IMAGE_EXACT
                                    );

                                    ?>

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

                                    <img src="<?= $preload['src']; ?>"
                                         alt="<?= $arItem['NAME']; ?>"
                                         loading="lazy">

                                <? } ?>

                            <? } ?>

                        </picture>

                        <div class="details">

                            <h3><?= $arItem['NAME']; ?></h3>

                            <? if (!empty($arItem['PREVIEW_TEXT'])) { ?>
                                <p><?= $arItem['PREVIEW_TEXT']; ?></p>
                            <? } ?>

                        </div>

                        <? if (!empty($arItem['DISPLAY_PROPERTIES']['BUTTON_LINK']['VALUE'])) { ?>

                            <button class="big primary button"
                                    data-id="<?= $arItem['ID']; ?>"
                                    data-href="<?= $arItem['DISPLAY_PROPERTIES']['BUTTON_LINK']['VALUE']; ?>">
                                <?= $arItem['DISPLAY_PROPERTIES']['BUTTON_TEXT']['VALUE']; ?>
                                <i class="icon-chevron-right"></i>
                            </button>

                        <? } ?>

                    </div>

                <?php } ?>

            </div>

        </div>

        <? $frame->beginStub(); ?>

        <? $frame->end(); ?>

    </section>

<?php } ?>
