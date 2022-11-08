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

    <div class="cart--default dropdown--container">

        <div class="indicator">
            <span class="value"></span>
            <button class="transparent">
                <i class="icon-menu"></i>
            </button>
        </div>

        <div class="dropdown cart">

            <?php $frame -> begin(); ?>

            <h2 class="title">Твой заказ</h2>

            <template name="cart">

                <ul v-for="item in items" class="items">

                    <li class="item">

                        <picture>
                            <source v-for="(media, source) in item.images" src="{{ src }}" media="{{ media }}">
                            <img src="{{ sources.preload.src }}" alt="{{ name }}">
                        </picture>

                        <h3>{{ item.name }}</h3>

                        <div class="prices">
                            <div v-for="price in prices" class="price">
                                <del v-if="discount > 0">{{ base_price }}</del>
                                <span>{{ price }}</span>
                            </div>
                        </div>

                        <div class="quantity">
                            {{ item.quantity }}
                        </div>

                        <button class="delete" data-action="delete" data-id="{{ item.id }}">
                            <i class="icon-delete"></i>
                        </button>

                    </li>

                </ul>

                <div class="total">

                    <div class="price">{{ cart.price }}</div>
                    <div class="delivery">{{ cart.delivery }}</div>
                    <div class="total">{{ cart.total }}</div>

                </div>

            </template>

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

    <? // @todo вот не знаю, как решать это: пока лучше всего подходит Vue, но он избыточен ?>

</noindex>
