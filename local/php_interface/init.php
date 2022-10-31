<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . "/local/vendor/autoload.php";

    use Bitrix\Main\Config\Option;

    // region глобальная константа DEBUG

    if (Option::get('main', 'update_devsrv') == 'Y') {
        $debug = true;
    }
    else {
        $debug = false;
    }

    /**
     * @const IS_DEBUG  Константа, определяющая режим работы сайта: отладочный, обычный.
     *               Значение задаётся через опцию "версия для отладки" в настройках обновления Битрикс.
     */
    define('IS_DEBUG', $debug);

    // endregion

    // region LOCAL ASSETS

    defin('LOCAL_ASSETS', '/local/assets');

    // endregion
