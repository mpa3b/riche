<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Riche\Breakpoint;
use Riche\Thumb;

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

$this -> setFrameMode(true);

$ratios = [
    'small'   => 2,
    'mobile'  => 2,
    'tablet'  => 1 / 1.5,
    'desktop' => 1 / 1.5,
    'wide'    => 1 / 2,
];

$frame = $this -> createFrame();

?>

<?php if (!empty($arResult['ITEMS'])) { ?>

    <article class="features--front wrap">

        <? $frame -> begin(); ?>

        <h2 hidden>RICHE COSMETICS</h2>

        <div class="accordion items">

            <? foreach ($arResult['ITEMS'] as $arItem) { ?>

                <section class="item">

                    <? if ($arItem['DETAIL_PICTURE']) { ?>

                        <picture>

                            <? foreach (Breakpoint::breakpoints as $media => $width) { ?>

                                <?

                                $image = CFile ::ResizeImageGet(
                                    $arItem['DETAIL_PICTURE']['ID'],
                                    Thumb ::calculateImageSize($width, $ratios[$media]),
                                    BX_RESIZE_IMAGE_PROPORTIONAL
                                );

                                ?>
                                <source data-srcset="<?= $image['src']; ?>"
                                        media="<?= Breakpoint ::getMedia($media); ?>">
                            <? } ?>

                            <img src="<?= Thumb::PLACEHOLDER; ?>" alt="<?= $arItem['NAME']; ?>" loading="lazy">

                        </picture>

                    <? } ?>

                    <div class="details">

                        <h3><?= $arItem['NAME']; ?></h3>

                        <? if (!empty($arItem['PREVIEW_TEXT'])) { ?>
                            <p><?= $arItem['PREVIEW_TEXT']; ?></p>
                        <? } ?>

                        <? if (!empty($arItem['DETAIL_PAGE_URL'])) { ?>
                            <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">Подробнее</a>
                        <? } ?>

                    </div>

                </section>

            <? } ?>

        </div>

        <? $frame -> end(); ?>

    </article>

<?php } ?>
