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

?>

<? if (!empty($arResult)) { ?>

    <?php $frame = $this->createFrame(); ?>

    <div class="row menu--main">

        <?php $frame->begin(); ?>

        <nav class="whole unit">

            <ul class="menu root">
                <?php foreach ($arResult as $arItem): ?>
                    <li>
                        <a href="<?= $arItem['LINK']; ?>"><?= $arItem['TEXT']; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>

        </nav>

        <?php $frame->end(); ?>

    </div>

<?php } ?>