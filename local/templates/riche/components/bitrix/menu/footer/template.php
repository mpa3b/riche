<? if (!defined("B_PROLOG_INCLUDED") or B_PROLOG_INCLUDED !== true) {
    die();
}

/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */

/** @var CBitrixComponent $component */

$this -> setFrameMode(true);

$frame = $this -> createFrame();

if (!empty($arResult)) { ?>

    <nav class="menu--footer">

        <? $frame -> begin(); ?>

        <? //@formatter:off ?>

        <ul class="menu">

            <? $previousLevel = 0; ?>

            <? foreach ($arResult as $arItem) { ?>

            <? if ($previousLevel and $arItem["DEPTH_LEVEL"] < $previousLevel) echo str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>

            <? if ($arItem["IS_PARENT"]): ?>

            <li>

                <span><?= $arItem["TEXT"] ?></span>

                <ul>

                    <? else: ?>

                        <li>
                            <a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>

                        </li>

                    <? endif; ?>

                    <? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>

            <? } ?>

        </ul>

        <? //@formatter:on ?>

                <? $frame -> end(); ?>

    </nav>

<? } ?>
