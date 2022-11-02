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

    d($arResult);

    $this->setFrameMode(true);

    $frame = $this->createFrame();

?>

<noindex>

    <div class="cart--default dropdown--container" data-component="cart">

        <?php $frame->begin(); ?>

        <div class="indicator">
            <span class="value"></span>
            <button class="transparent">
                <i class="isax bag"></i>
            </button>
        </div>

        <div class="dropdown">

            <h2 class="title">Твой заказ</h2>

            <ul class="items"></ul>

            <menu class="actions buttons">

                <button class="close" type="button">
                    <i class="isax close"></i>
                    Закрыть
                </button>

                <form action="<?= $arParams['ORDER_URL']; ?>">
                    <button class="submit primary" type="submit">
                        <i class="isax check"></i>
                        Оформить
                    </button>
                </form>

            </menu>

        </div>

        <?php $frame->end(); ?>

    </div>

    <template data-name="cart--item">

        <li class="item">

            <h3 data-name="cart--item--name"></h3>

            <picture data-name="cart--item--picture"></picture>

            <div class="prices">
                <del class="old price"></del>
                <span class="discount price"></span>
            </div>

            <div class="quantity">
                <button class="transparent" data-id="" data-action="minus">
                    <i class="isax minus"></i>
                </button>
                <span class="value"></span>
                <button class="transparent" data-id="" data-action="plus">
                    <i class="isax plus"></i>
                </button>
            </div>

            <div class="total">
                <div class="price"></div>
            </div>

            <div class="actions">
                <button class="delete" data-id="" data-action="delete">
                    <i class="isax delete"></i>
                    Удалить
                </button>
            </div>

        </li>

    </template>

</noindex>
