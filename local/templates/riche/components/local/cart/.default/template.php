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

        <div class="dropdown">

            <?php $frame->begin(); ?>

            <h2 class="title">Твой заказ</h2>

            <ul class="items" data-template-name="cart-item"></ul>

            <div class="actions buttons">

                <form action="<?= $arParams['ORDER_URL']; ?>">
                    <button class="submit primary wide button" type="submit" disabled>
                        <i class="icon check"></i>
                        Оформить
                    </button>
                </form>

            </div>

            <?php $frame->end(); ?>

        </div>

        <template data-template-name="cart--item">

            <li class="item">

                <h3 data-name="cart--item--name"></h3>

                <picture data-name="cart--item--picture">
                    <img>
                </picture>

                <div class="prices">
                    <del class="old price">
                        <span class="value"></span>
                    </del>
                    <span class="discount price"></span>
                    <span class="value"></span>
                </div>

                <div class="quantity">
                    <button class="transparent" data-id="" data-action="minus">
                        <i class="icon minus"></i>
                    </button>
                    <span class="value"></span>
                    <button class="transparent" data-id="" data-action="plus">
                        <i class="icon plus"></i>
                    </button>
                </div>

                <div class="total">
                    <div class="price">
                        <span class="value"></span>
                    </div>
                </div>

                <div class="actions">
                    <button class="delete" data-id="" data-action="delete">
                        <i class="icon delete"></i>
                        Удалить
                    </button>
                </div>

            </li>

        </template>

    </div>

</noindex>
