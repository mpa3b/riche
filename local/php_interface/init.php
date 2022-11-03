<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . "/local/vendor/autoload.php";

    use Bitrix\Main\Application;
    use Bitrix\Main\Config\Option;

    // region глобальная константа DEBUG

    if (Option::get('main', 'update_devsrv') == 'Y') {
        define('DEBUG', true);
    }

    // endregion

    // region CONST

    const LOCAL_ASSETS = '/local/assets';

    const CACHE_TTL    = 60 * 60 * 24 * 3;
    const ORDER_URL    = '/order/';
    const CHECKOUT_URL = '/order/checkout/';
    const SHOP_URL     = '/shop/';

    // endregion
