<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var \CBitrixComponentTemeplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

$this->setFrameMode(true);

$frame = $this->createFrame();

?>

<div class="menu--mobile mobiles-only" role="navigation">

    <?php $frame->begin(); ?>

    <div class="wrap">

        <button class="transparent button trigger">
            <i class="icon-x"></i>
        </button>

        <nav>

            <ul class="menu root">

                <?php foreach ($arResult as $arItem): ?>
                    <li>
                        <a href="<?= $arItem['LINK']; ?>"><?= $arItem['TEXT']; ?></a>
                    </li>
                <?php endforeach; ?>

            </ul>

        </nav>

        <?php $APPLICATION->IncludeComponent(
            'bitrix:main.include',
            '',
            [
                "AREA_FILE_SHOW"      => "sect",
                "AREA_FILE_SUFFIX"    => "contact",
                "AREA_FILE_RECURSIVE" => "N",

                "COMPOSITE_FRAME_MODE" => "A",
                "COMPOSITE_FRAME_TYPE" => "AUTO",
            ],
            false
        ); ?>

        <?php $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            ".default",
            [
                "AREA_FILE_SHOW"      => "sect",
                "AREA_FILE_SUFFIX"    => "links",
                "EDIT_TEMPLATE"       => "",
                "AREA_FILE_RECURSIVE" => "Y",

                "COMPOSITE_FRAME_MODE" => "A",
                "COMPOSITE_FRAME_TYPE" => "AUTO"
            ]
        ); ?>

    </div>

    <?php $frame->end(); ?>

</div>
