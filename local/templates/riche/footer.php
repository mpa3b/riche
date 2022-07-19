<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

global $USER, $APPLICATION;
?>

<div id="page--footer">

    <div class="wrap">

        <div class="row">

            <div id="page--footer--contact">
                Контакты
            </div>

            <div id="page--footer--menu">

                <?php $APPLICATION->IncludeComponent(
                    "riche:menu",
                    "menu--footer",
                    [
                        'MENU_NAME'  => 'footer',
                        'CACHE_TIME' => 7200
                    ]
                ); ?>

            </div>

            <div id="page--footer--about">
                Коротко о нас
            </div>

        </div>

        <div class="row">

            <div id="page--footer--outro">
                RICHE
            </div>

        </div>

    </div>

</div>

<noindex>
    <? $APPLICATION->ShowCSS(true, false); // Output css site styles ?>
</noindex>

</body>
</html>