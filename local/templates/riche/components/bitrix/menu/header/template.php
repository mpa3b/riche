<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

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

$frame = $this->createFrame()->begin();

?>
<nav id="menu--header">

    <ul class="menu root">

        <? foreach ($arResult as $arItem): ?>
            <li>
                <a href="<?= $arItem['LINK']; ?>">
                    <?= $arItem['TEXT']; ?>
                </a>
            </li>
        <? endforeach; ?>

    </ul>

    <? $frame->end(); ?>

</nav>