<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

global $APPLICATION, $USER;

$APPLICATION->SetTitle('Главная');
$USER->Authorize(1);
?>
<? $APPLICATION->IncludeComponent(
    "riche:menu",
    "",
    [
        'BLOCK_ID'   => 'header_menu',
        'MENU_ITEMS' => [
            [
                'link' => '/',
                'name' => 'Главная'
            ],
            [
                'link' => '/shop/hair',
                'name' => 'Волосы'
            ],
            [
                'link' => '/shop/face',
                'name' => 'Лицо'],
            [
                'link' => '/shop/body',
                'name' => 'Тело'
            ]
        ]
    ]
);
?>
<? $APPLICATION->IncludeComponent(
    "riche:banner",
    "",
    [
        'BLOCK_ID' => 'header_banner',
        'FIELDS'   => [
            'ID',
            'NAME',
            'PREVIEW_TEXT',
            'DETAIL_TEXT',
        ]
    ]
);
?>

<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>