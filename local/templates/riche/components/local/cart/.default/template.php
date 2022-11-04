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

    <div class="cart--default dropdown--container"
         data-component="local:cart">

        <div class="indicator">
            <span class="value"></span>
            <button class="transparent">
                <i class="icon bag"></i>
            </button>
        </div>

        <div class="dropdown cart">

            <?php $frame->begin(); ?>

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
                        <i class="icon check"></i>
                        Оформить
                    </button>
                </form>

            </div>

            <?php $frame->end(); ?>

        </div>

        <template data-template-name="cart-item">

            <li class="item">

                <h3></h3>

                <p></p>

                <picture>
                    <source>
                    <source>
                    <source>
                    <img>
                </picture>

                <div class="prices">
                    <del class="price"></del>
                    <span class="price"></span>
                    <span class="discount price"></span>
                </div>

                <div class="quantity">
                    <button class="transparent"
                            data-id=""
                            data-quantity="">
                        <i class="icon minus"></i>
                    </button>
                    <span class="value"></span>
                    <button class="transparent"
                            data-id=""
                            data-quantity="">
                        <i class="icon plus"></i>
                    </button>
                </div>

                <div class="total"></div>

                <div class="actions">
                    <button class="delete"
                            data-id="">
                        <i class="icon delete"></i>
                        Удалить
                    </button>
                </div>

            </li>

        </template>

    </div>

</noindex>
