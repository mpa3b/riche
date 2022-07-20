<?php if (!defined("B_PROLOG_INCLUDED") or B_PROLOG_INCLUDED !== true) die();

/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */

/** @var CBitrixComponent $component */

$this->setFrameMode(true);

$frame = $this->createFrame();

if (!empty($arResult)) { ?>

    <nav id="menu--footer">

        <?php $frame->begin(); ?>

        <?php //@formatter:off ?>

        <ul class="menu">

            <?php $previousLevel = 0; ?>

            <?php foreach ($arResult as $arItem) { ?>

            <?php if ($previousLevel and $arItem["DEPTH_LEVEL"] < $previousLevel) echo str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>

            <?php if ($arItem["IS_PARENT"]): ?>

            <li>
                <a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
                <ul>

                    <?php else: ?>

                        <li>
                            <a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
                        </li>

                    <?php endif; ?>

                    <?php $previousLevel = $arItem["DEPTH_LEVEL"]; ?>

            <?php } ?>

        </ul>

        <?php //@formatter:on ?>

                <?php $frame->end(); ?>

    </nav>

<?php } ?>
