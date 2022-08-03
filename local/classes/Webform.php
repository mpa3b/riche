<?php

namespace Local;

//use Bitrix\Main\EventManager;
//
//$eventManager = EventManager::getInstance();
//
//$eventManager->addEventHandler(
//    'form',
//    'onResultAdd',
//    [
//        'WebFormRequestSend',
//        "onAfterAdd"
//    ]
//);

//@todo сделать нормально, тут статические айди, код негибкий.

/**
 *
 * Этот класс должен обрабатывать события вебформ
 * это заглушка, тут ничего нет пока что.
 *
 * Потом будем сюда пихать интеграции, хотя скорее всего будут модули.
 *
 */

define("UNISENDER_APIKEY", "6by8kdeezfru8y5uij3hupqt1ywjkhz3takurefy");

class Webform
{

    public function onAdd($WEB_FORM_ID, $RESULT_ID)
    {
        if (Loader::includeModule('form') && $WEB_FORM_ID == 1) {

            $arResultStub = [];
            $arAnswerStub = [];

            CFormResult::GetDataByID(
                $RESULT_ID,
                [],
                $arResultStub,
                $arAnswerStub
            );

            if (!empty($arAnswerStub)) {

                $answerList = array_shift($arAnswerStub);
                $answer     = array_shift($answerList);

                $this->curl($answer['USER_TEXT']);

            }

        }
    }

    public function triggerUnisender($email)
    {

        $requestURL = 'https://api.unisender.com/ru/api/subscribe';

        $requestParams = [
            'format'       => 'json',
            'api_key'      => UNISENDER_APIKEY,
            'list_ids'     => 44, // а тут не массив?
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

}