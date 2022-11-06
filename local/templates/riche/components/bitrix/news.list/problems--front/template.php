<?php use Riche\Breakpoint;
use Riche\Thumb;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
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

$this->setFrameMode(true);

$this->addExternalJs(LOCAL_ASSETS . '/slick-carousel/slick/slick.js');
$this->addExternalCss(LOCAL_ASSETS . '/slick-carousel/slick/slick.css');
$this->addExternalCss(SITE_TEMPLATE_PATH . '/styles/slick.css');

$frame = $this->createFrame();

?>

<?php if (!empty($arResult['ITEMS'])) { ?>

    <div class="problems--front">

        <? $frame->begin(); ?>

        <div class="items slider">

            <? foreach ($arResult['ITEMS'] as $arItem) { ?>

                <div class="item">

                    <? if ($arItem['DETAIL_PICTURE']) { ?>

                        <picture>

                            <? foreach (Breakpoint::breakpoints as $media => $width) { ?>

                                <?

                                $image = CFile::ResizeImageGet(
                                    $arItem['DETAIL_PICTURE']['ID'],
                                    Thumb::calculateImageSize($width),
                                    BX_RESIZE_IMAGE_PROPORTIONAL
                                );

                                ?>

                                <source data-srcset="<?= $image['src']; ?>"
                                        media="<?= Breakpoint::getMedia($media); ?>">

                            <? } ?>

                            <img src="<?= Thumb::PLACEHOLDER; ?>" alt="<?= $arItem['NAME']; ?>">

                        </picture>

                    <? } ?>

                    <div class="details">

                        <h3><?= $arItem['NAME']; ?></h3>

                        <? if (!empty($arItem['PREVIEW_TEXT'])) { ?>
                            <p><?= $arItem['PREVIEW_TEXT']; ?></p>
                        <? } ?>

                        <? if (!empty($arItem['DISPLAY_PROPERTIES']['LINK']['VALUE'])) { ?>
                            <button data-id="<?= $arItem['ID']; ?>"
                                    data-href="<?= $arItem['DISPLAY_PROPERTIES']['LINK']['VALUE']; ?>">
                                <?= $arItem['DISPLAY_PROPERTIES']['BUTTON_TEXT']['VALUE']; ?>
                                <i class="icon-chevron-right"></i>
                            </button>
                        <? } ?>

                    </div>

                </div>

            <? } ?>

        </div>

        <? $frame->end(); ?>

    </div>

<?php } ?>
