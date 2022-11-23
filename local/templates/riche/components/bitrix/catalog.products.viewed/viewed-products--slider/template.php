<?

use Bitrix\Main\Page\AssetMode;

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

if (!empty($arResult['ITEMS'])) { ?>

    <?php $frame = $this->createFrame(); ?>

    <section class="viewed-products--default">

        <?

        $frame->begin();

        $frame->setAssetMode(AssetMode::ALL);
        $frame->setAnimation(false);

        ?>

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

        <? $frame->beginStub(); ?>

        <? $frame->end(); ?>

    </section>

<?php } ?>
