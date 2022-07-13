<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/local/vendor/autoload.php";

use Bitrix\Main\EventManager;
use Bitrix\Main\Loader;
use Local\Buffer;

Loader::registerAutoLoadClasses(
    null,
    [
        'buffer'      => '/local/classes/Buffer.php'
    ]
);

$eventManager = EventManager::getInstance();

// очистка буфера
$eventManager->addEventHandler(
    'main',
    'OnEndBufferContent',
    [
        Buffer::class,
        "clean"
    ]
);
