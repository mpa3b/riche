<?

use Riche\Breakpoint;
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
/** @var CBitrixComponent $component */

/**
 * Это шаблон для *одноуровневого* вывода меню
 **/

$this->setFrameMode(true);

if (!empty($arResult['SECTIONS'])) {

    $this->addExternalJs(LOCAL_ASSETS . '/slick-carousel/slick/slick.js');
    $this->addExternalCss(LOCAL_ASSETS . '/slick-carousel/slick/slick.css');
    $this->addExternalCss(SITE_TEMPLATE_PATH . '/styles/slick.css');

    $catalogDepthLimit = $arResult["SECTION"]["DEPTH_LEVEL"];
    $currentDepth      = $catalogDepthLimit;

    $frame = $this->createFrame();

    ?>

    <nav class="section-list--catalog--default">

        <div class="wrap">

            <div class="items slider">

                <? $frame->begin(); ?>

                <?php foreach ($arResult['SECTIONS'] as $i => $section) { ?>

                    <div class="item">

                        <div class="wrapper" data-id="<?= $section['ID']; ?>">

                            <h3 class="name"><?= $section['NAME']; ?></h3>

                            <?

                            $preload = CFile::ResizeImageGet(
                                $section['PICTURE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['preload'], 1),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $small = CFile::ResizeImageGet(
                                $section['PICTURE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['small'] / 2, 1.5),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $mobile = CFile::ResizeImageGet(
                                $section['PICTURE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['mobile'] / 3, 1.5),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $tablet = CFile::ResizeImageGet(
                                $section['PICTURE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['tablet'] / 3, 1.5),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $desktop = CFile::ResizeImageGet(
                                $section['PICTURE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['desktop'] / 4, 1.5),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $wide = CFile::ResizeImageGet(
                                $section['PICTURE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['wide'] / 4, 1.5),
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
                                     alt="<?= $section['NAME']; ?>">

                            </picture>

                            <button class="rounded">
                                <i class="icon-chevron-right"></i>
                            </button>

                            <a href="<?= $section['SECTION_PAGE_URL']; ?>" class="link"></a>

                        </div>

                    </div>

                <?php } ?>

                <? $frame->beginStub(); ?>

                <? $frame->end(); ?>

            </div>

        </div>

    </nav>

    <?php

}
