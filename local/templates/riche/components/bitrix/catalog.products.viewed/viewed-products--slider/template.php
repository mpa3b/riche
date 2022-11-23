<?

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

/**
 * @global CMain                 $APPLICATION
 * @var array                    $arParams
 * @var array                    $arResult
 * @var CatalogSectionComponent  $component
 * @var CBitrixComponentTemplate $this
 */

$this->setFrameMode(true);

$frame = $this->createFrame();

if (!empty($arResult['ITEMS'])) { ?>

    <section class="viewed-products--default">

        <div class="wrap">

            <h2>Вы смотрели</h2>

            <div class="items slider">

                <? foreach ($arResult['ITEMS'] as $arItem) { ?>

                    <div class="item">

                        <h3><?= $arItem['NAME']; ?></h3>

                    </div>

                <? } ?>

            </div>

        </div>

    </section>

<?php } ?>

<?php d($arParams); ?>
<?php d($arResult); ?>
