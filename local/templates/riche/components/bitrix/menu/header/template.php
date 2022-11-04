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

<div class="menu--header dropdown--container">

    <button class="transparent button on-mobiles-only trigger">
        <i class=  "h-menu"></i>
    </button>

    <div class="dropdown wrapper">

        <button class="transparent close">
            <i class=  "h-cross"></i>
        </button>

        <nav>

            <ul class="menu root">

                <?php $frame->begin(); ?>

                <?php foreach ($arResult as $arItem): ?>
                    <li>
                        <a href="<?= $arItem['LINK']; ?>"><?= $arItem['TEXT']; ?></a>
                    </li>
                <?php endforeach; ?>

                <?php $frame->end(); ?>

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

    </div>

</div>
