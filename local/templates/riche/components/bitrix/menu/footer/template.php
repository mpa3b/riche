<?php

if (!defined("B_PROLOG_INCLUDED") or B_PROLOG_INCLUDED !== true) {
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

if (!empty($arResult)) { ?>

    <?php $frame = $this->createFrame(); ?>

    <nav class="menu--footer <?= strtolower($arParams['ROOT_MENU_TYPE']); ?>" role="navigation">

        <?php $frame->begin(); ?>

        <?php $frame->setAnimation('false'); ?>

        <?php //@formatter:off ?>

        <?php if (!empty($arParams['TITLE'])) { ?>

            <h2><?= $arParams['TITLE']; ?></h2>

        <?php } ?>

        <ul class="menu">

            <?php $previousLevel = 0; ?>

            <?php foreach ($arResult as $arItem) { ?>

                <?php if ($previousLevel and $arItem["DEPTH_LEVEL"] < $previousLevel) { ?>
                    <?= str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>
                <?php } ?>

                <?php if ($arItem["IS_PARENT"]): ?>

                    <li>

                        <span><?= $arItem["TEXT"] ?></span>

                        <ul>

                <?php else: ?>

                    <li>
                        <a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>

                    </li>

                <?php endif; ?>

                <?php $previousLevel = $arItem["DEPTH_LEVEL"]; ?>

            <?php } ?>

        </ul>

        <?php $frame->beginStub(); ?>

        <?php $frame->end(); ?>

        <?php //@formatter:on ?>

    </nav>

<?php } ?>
