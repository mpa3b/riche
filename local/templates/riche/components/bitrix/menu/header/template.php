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

<nav class="menu--header" role="navigation">

    <?php $frame->begin(); ?>

    <button class="transparent button trigger">
        <i class="icon-menu"></i>
    </button>

    <div class="dropdown wrapper">

        <ul class="menu root">

            <?php foreach ($arResult as $arItem): ?>
                <li>
                    <a href="<?= $arItem['LINK']; ?>"><?= $arItem['TEXT']; ?></a>
                </li>
            <?php endforeach; ?>


        </ul>

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

    </div>

    <?php $frame->beginStub(); ?>

    <?php $frame->end(); ?>

</nav>
