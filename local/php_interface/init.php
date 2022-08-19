<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . "/local/vendor/autoload.php";

    use Bitrix\Main\Application;
    use Bitrix\Main\Config\Option;
    use Bitrix\Main\EventManager;
    use Bitrix\Main\Loader;
    use Local\Buffer;

    //region костыль для очистки буфера от лишних элементов

    Loader::registerAutoLoadClasses(
        null,
        [
            'buffer' => '/local/classes/Buffer.php'
        ]
    );

    $eventManager = EventManager::getInstance();

    $eventManager->addEventHandler(
        'main',
        'OnEndBufferContent',
        [
            Buffer::class,
            "clean"
        ]
    );

//endregion

//region глобальная константа DEBUG

    if (Option::get('main', 'update_devsrv') == 'Y') {
        $debug = true;
    }
    else {
        $debug = false;
    }

    /**
     * @const DEBUG  Константа, определяющая режим работы сайта: отладочный, обычный. Значение задаётся через опцию
     *        "версия для отладки" в настройках обновления Битрикс.
     */
    define('DEBUG', $debug);

//endregion

//region глобальная константа IS_AJAX

    $request = Application::getInstance()->getContext()->getRequest();

    /**
     * @const IS_AJAX Константа, сообщающая, является ли текущий запрос аякс-запросом
     */
    define('IS_AJAX', $request->isAjaxRequest());

//endregion
