<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

global $APPLICATION, $USER;

$APPLICATION->SetTitle('Главная');
//$USER->Authorize(1);
?>
<? $APPLICATION->IncludeComponent(
    "riche:menu",
    "",
    [
        'MENU_ITEMS' => 'main',
        'CACHE_TIME' => 7200
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