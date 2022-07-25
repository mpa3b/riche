<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Riche\PreloadLinks;

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemeplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

$this->setFrameMode(true);

$frame = $this->createFrame();

?>
<nav class="menu--header">

    <button class="transparent button hide--on-desktop trigger burger">
        <i class="icon burger"></i>
    </button>

    <?php $frame->begin(); ?>

    <div class="wrapper">

        <button class="transparent trigger button hide--on-desktop close">
            <i class="icon close"></i>
        </button>

        <ul class="menu root">

            <?php foreach ($arResult as $arItem): ?>
                <li>
                    <a href="<?= $arItem['LINK']; ?>">
                        <?= $arItem['TEXT']; ?>
                    </a>
                </li>
            <?php endforeach; ?>

        </ul>

    </div>

    <?php $frame->end(); ?>

</nav>