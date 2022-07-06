<?php
$arUrlRewrite = array(
    2 =>
        array(
            'CONDITION' => '#^/online/([\\.\\-0-9a-zA-Z]+)(/?)([^/]*)#',
            'RULE' => 'alias=$1',
            'ID' => NULL,
            'PATH' => '/desktop_app/router.php',
            'SORT' => 100,
        ),
    1 =>
        array(
            'CONDITION' => '#^/video([\\.\\-0-9a-zA-Z]+)(/?)([^/]*)#',
            'RULE' => 'alias=$1&videoconf',
            'ID' => NULL,
            'PATH' => '/desktop_app/router.php',
            'SORT' => 100,
        ),
    4 =>
        array(
            'CONDITION' => '#^\\/?\\/mobileapp/jn\\/(.*)\\/.*#',
            'RULE' => 'componentName=$1',
            'ID' => NULL,
            'PATH' => '/bitrix/services/mobileapp/jn.php',
            'SORT' => 100,
        ),
    6 =>
        array(
            'CONDITION' => '#^/bitrix/services/ymarket/#',
            'RULE' => '',
            'ID' => '',
            'PATH' => '/bitrix/services/ymarket/index.php',
            'SORT' => 100,
        ),
    3 =>
        array(
            'CONDITION' => '#^/online/(/?)([^/]*)#',
            'RULE' => '',
            'ID' => NULL,
            'PATH' => '/desktop_app/router.php',
            'SORT' => 100,
        ),
    0 =>
        array(
            'CONDITION' => '#^/stssync/calendar/#',
            'RULE' => '',
            'ID' => 'bitrix:stssync.server',
            'PATH' => '/bitrix/services/stssync/calendar/index.php',
            'SORT' => 100,
        ),
    5 =>
        array(
            'CONDITION' => '#^/rest/#',
            'RULE' => '',
            'ID' => NULL,
            'PATH' => '/bitrix/services/rest/index.php',
            'SORT' => 100,
        ),
    [
        ///api/<component_vendor>/<component_name>/<class_name>/<action>/.
        "CONDITION" => "#^/api/([a-zA-Z0-9]+)/([a-zA-Z0-9\.]+)/([a-zA-Z0-9\.]+)/([a-zA-Z0-9]+)/?.*#",
        "RULE" => "action=$1:$2.api.$3.$4",
        "PATH" => "/bitrix/services/main/ajax.php",
    ],
);
