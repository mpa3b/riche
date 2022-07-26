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

// очистка буфера
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
} else {
    $debug = false;
}

/**
 * Константа, определяющая режим работы сайта: отладочный, обычный. Значение задаётся через опцию "версия для отладки" в настройках обновления Битрикс.
 */
define('DEBUG', $debug);

$request = Application::getInstance()->getContext()->getRequest();

/**
 * Константа, сообщающая, является ли текущий запрос аякс-запросом
 */
define('IS_AJAX', $request->isAjaxRequest());

//endregion


//region Обработка Веб-Форм

class WebFormRequestSend{

    protected function curl($email){
        $apiKey = '6by8kdeezfru8y5uij3hupqt1ywjkhz3takurefy';

        $requestURL = 'https://api.unisender.com/ru/api/subscribe';

        $requestParams = [
            'format'       => 'json',
            'api_key'      => $apiKey,
            'list_ids'     => 44,
            'fields'       => [
                'email' => strtolower(trim($email))
            ],
            'double_optin' => 0,
            'overwrite'    => 0,
            'request_ip'   => $_SERVER['REMOTE_ADDR'],
            'confirm_ip'   => $_SERVER['SERVER_ADDR'],
        ];

        $request = curl_init($requestURL . '?' . http_build_query($requestParams));

        curl_setopt($request, CURLOPT_POST, false);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($request);

        if ($response) curl_close($request);

        return $response;
    }


    public function afterAdd($WEB_FORM_ID, $RESULT_ID){
        if(Loader::includeModule('form') && $WEB_FORM_ID == 1){
            $arResultStub = [];
            $arAnswerStub = [];

            CFormResult::GetDataByID(
                $RESULT_ID,
                [],
                $arResultStub,
                $arAnswerStub
            );

            if (!empty($arAnswerStub)) {
                $answerList  = array_shift($arAnswerStub);
                $answer = array_shift($answerList);

                $this->curl($answer['USER_TEXT']);
            }

        }
    }
}

$eventManager->addEventHandler(
    'form',
    'onAfterResultAdd',
    [
        'WebFormRequestSend',
        "afterAdd"
    ]
);

//endregion