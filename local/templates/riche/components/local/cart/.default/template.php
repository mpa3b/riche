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

    $this->setFrameMode(true);

    $this->addExternalJs(LOCAL_ASSETS . '/vue/dist/vue.global.js');

    $frame = $this->createFrame();

?>

<noindex>

    <div class="cart--default dropdown--container" data-component="local:cart">

        <div class="indicator">
            <span class="value"></span>
            <button class="transparent">
                <i class="icon bag"></i>
            </button>
        </div>

        <div class="dropdown cart">

            <?php $frame->begin(); ?>

            <h2 class="title">Твой заказ</h2>

            <ul class="items">

                <template v-for="item in items">

                    <li class="item">

                        <h3>{{ item.name }}</h3>

                        <p v-if="item.description">{{ item.anounce }}</p>

                        <picture>
                            <source v-for="(media, src) in item.picture" srcset="{{ image.src }}"
                                    media="{{ image.media }}">
                            <img src="{{ item.picture.preload.src }}">
                        </picture>

                        <div class="prices" v-for="price in item.prices">
                            <del class="price" v-if="price.discount > 0">{{ price.base_price }}</del>
                            <span class="price" v-if="price.discount > 0">{{ price.price }}</span>
                            <span class="discount price" v-if="price.discount < 0">{{ price.price }}</span>
                        </div>

                        <div class="quantity">
                            <button class="transparent" data-action="minus" data-id="{{ item.id }}">
                                <i class="icon minus"></i>
                            </button>
                            <span class="value">{{ item.quantity }}</span>
                            <button class="transparent" data-action="plus" data-id="{{ item.id }}">
                                <i class="icon plus"></i>
                            </button>
                        </div>

                        <div class="total">
                            <div class="price">{{ item.total }}</div>
                        </div>

                        <div class="actions">
                            <button class="delete" data-action="delete" data-id="{{ item.id }}">
                                <i class="icon delete"></i>
                                Удалить
                            </button>
                        </div>

                    </li>

                </template>

            </ul>

            <div class="total">

                <template>

                    <div class="price">{{ cart.price }}</div>
                    <div class="delivery">{{ cart.delivery_price }}</div>
                    <div class="total">{{ cart.total }}</div>

                </template>

            </div>

            <div class="actions buttons">

                <button class="close">Закрыть</button>

                <form action="<?= $arParams['CHECKOUT_URL']; ?>">
                    <button class="submit primary wide button" type="submit" disabled>
                        <i class="icon check"></i>
                        Оформить
                    </button>
                </form>

            </div>

            <?php $frame->end(); ?>

        </div>

    </div>

</noindex>
