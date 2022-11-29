<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

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

$this->setFrameMode(true);

$this->addExternalJs(LOCAL_ASSETS . '/slick-carousel/slick/slick.js');
$this->addExternalCss(LOCAL_ASSETS . '/slick-carousel/slick/slick.css');
$this->addExternalCss(SITE_TEMPLATE_PATH . '/styles/slick.css');

$frame = $this->createFrame();

?>

<? if (!empty($arResult['ITEMS'])) { ?>

    <aside class="reviews--catalog--element--reviews">

        <? $frame->begin(); ?>

        <div class="wrap">

            <div class="items slider">

                <? foreach ($arResult['ITEMS'] as $arItem) { ?>

                    <?

                    $image = CFile::ResizeImageGet(
                        $arItem['DISPLAY_PROPERTIES']['AUTHOR_PICTURE']['VALUE'],
                        Thumb::calculateImageSize(60, 1),
                        BX_RESIZE_IMAGE_EXACT
                    );

                    ?>

                    <div class="item">

                        <div class="header field">

                            <div class="author">

                                <picture class="picture">

                                    <img data-src="<?= $image['src']; ?>"
                                         alt="<?= $arItem['DISPLAY_PROPERTIES']['AUTHOR_NAME']['VALUE']; ?>"
                                         loading="lazy">

                                </picture>

                                <div>

                                    <div class="name">
                                        <?= $arItem['DISPLAY_PROPERTIES']['AUTHOR_NAME']['VALUE']; ?>
                                    </div>
                                    <?

                                    $ratingLimit = 5;

                                    // @todo возможно свойство стоит переделать на другой тип. Список, например.

                                    ?>

                                    <? if ($arItem['DISPLAY_PROPERTIES']['RATING']) { ?>

                                        <div class="rating field">
                                            <? for ($i = 1; $i <= $ratingLimit; $i++) { ?>
                                                <i class="icon-star <? if ($i <= $arItem['DISPLAY_PROPERTIES']['RATING']['VALUE']) { ?> active<? } ?>"></i>
                                            <? } ?>
                                        </div>

                                    <? } ?>

                                </div>

                            </div>

                            <span class="date"><?= $arItem['DISPLAY_ACTIVE_FROM']; ?></span>

                        </div>

                        <div class="review field">
                            <?= trim($arItem['DETAIL_TEXT']); ?>
                        </div>

                        <? $APPLICATION->IncludeComponent(
                            "bitrix:iblock.vote",
                            "",
                            [
                                "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                                "IBLOCK_ID"   => $arParams["IBLOCK_ID"],

                                "ELEMENT_ID"  => $arItem['ID'],

                                "MAX_VOTE"    => $arParams["MAX_VOTE"],
                                "VOTE_NAMES"  => $arParams["VOTE_NAMES"],
                                "CACHE_TYPE"  => $arParams["CACHE_TYPE"],
                                "CACHE_TIME"  => $arParams["CACHE_TIME"],
                            ],
                            $component
                        ); ?>

                    </div>

                <?php } ?>

            </div>

        </div>

        <? $frame->beginStub(); ?>

        <? $frame->end(); ?>

    </aside>

<? } ?>
