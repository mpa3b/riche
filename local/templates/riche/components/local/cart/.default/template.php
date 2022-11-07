<?php

if (!defined("B_PROLOG_INCLUDED") or B_PROLOG_INCLUDED !== true) {
    die();
}

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

$this -> setFrameMode(true);

$this -> addExternalJs(LOCAL_ASSETS . '/jsrender/jsrender.js');

$frame = $this -> createFrame();

?>

<noindex>

    <div class="cart--default dropdown--container"
         data-component="local:cart">

        <div class="indicator">
            <span class="value"></span>
            <button class="transparent">
                <i class="icon-menu"></i>
            </button>
        </div>

        <div class="dropdown cart">

            <?php $frame -> begin(); ?>

            <h2 class="title">Твой заказ</h2>

            <ul class="items list"></ul>

            <div class="total">

                <div class="price"></div>
                <div class="delivery"></div>
                <div class="total"></div>

            </div>

            <div class="actions buttons">

                <button class="close">Закрыть</button>

                <form action="<?= $arParams['CHECKOUT_URL']; ?>">
                    <button class="submit primary wide button" type="submit" disabled>
                        <i class="icon-check"></i>
                        Оформить
                    </button>
                </form>

            </div>

            <?php $frame -> end(); ?>

        </div>

    </div>

    <template>

        <li class="item">

            <picture>
                <img src="" alt="">
            </picture>

            <h3></h3>

            <div class="prices">
                <div class="price">
                    <del></del>
                    <span></span>
                </div>
            </div>

            <button class="delete" data-action="delete">
                <i class="icon-delete"></i>
            </button>

        </li>

    </template>

</noindex>
