<?php
$arUrlRewrite = [
    0 => [
        'CONDITION' => '#^/shop/#',
        'RULE'      => '',
        'ID'        => 'bitrix:catalog',
        'PATH'      => '/shop/index.php',
        'SORT'      => 100,
    ],
    1 => [
        'CONDITION' => '#^/#',
        'RULE'      => '',
        'ID'        => 'bitrix:form',
        'PATH'      => '/index.php',
        'SORT'      => 100,
    ],
];
