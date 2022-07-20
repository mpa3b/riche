<?php if (!defined("B_PROLOG_INCLUDED") or B_PROLOG_INCLUDED !== true) die();

/** @var array $arParams */
/** @var array $arResult */
/** @global \CMain $APPLICATION */
/** @global \CUser $USER */
/** @global \CDatabase $DB */
/** @var \CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var array $templateData */
/** @var \CBitrixComponent $component */

$this->setFrameMode(true);

$frame = $this->createFrame();

?>

<div id="news-list--front-banners">

    <? $frame->begin(); ?>

    <div class="wrap">

        <div class="items">

            <? foreach ($arResult['ITEMS'] as $i => $arItem) { ?>

                <div class="item">

                    <picture>
                        <srcset></srcset>
                        <srcset></srcset>
                        <srcset></srcset>
                        <img src="" alt="">
                    </picture>
                    
                    <h3></h3>
                    <p></p>

                    <a href=""></a>

                </div>

            <? } ?>

        </div>

    </div>

    <? $frame->end(); ?>

</div>
