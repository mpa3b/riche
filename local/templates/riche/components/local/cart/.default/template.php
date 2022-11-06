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

$this->addExternalJs(LOCAL_ASSETS . '/jsrender/jsrender.js');

$frame = $this->createFrame();

?>

<noindex>

    <div class="cart--default dropdown--container"
         data-component="local:cart">

        <div class="indicator">
            <span class="value"></span>
            <button class="transparent">
                <i load-icon="menu"></i>
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
                        <i class="icon-check"></i>
                        Оформить
                    </button>
                </form>

            </div>

            <?php $frame->end(); ?>

        </div>

        <script type="text/x-jsrender">

            <li>

                <h3>{{:name}}</h3>

                {{ if announce }}
                <p>{{:announce}}</p>
                {{ /if }}

                <picture>
                    {{ for picture as (media, source)}}
                    <source srcset="{{:source}}" media="{{:media}}">
                    {{ /for }}
                    <img src="{{:picture.preload.src}}">
                </picture>

                <div class="prices">
                    <del class="price">{{:price}}</del>
                    <span class="price">{{:price}}</span>
                    <span class="discount price">{{:price}}</span>
                </div>

                <div class="quantity">
                    <button class="transparent"
                            data-id="{{:id}}"
                            data-quantity="{{:quantity}}">
                        <i class="icon-minus"></i>
                    </button>
                    <span class="value">{{:quantity}}</span>
                    <button class="transparent"
                            data-id="{{:id}}"
                            data-quantity="{{:quantity}}">
                        <i class="icon-plus"></i>
                    </button>
                </div>

                <div class="total">{{:total}}</div>

                <div class="actions">
                    <button class="delete"
                            data-id="{{:id}}">
                        <i class="icon-delete"></i>
                        Удалить
                    </button>
                </div>

            </li>


        </script>

    </div>

</noindex>
