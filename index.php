<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

global $APPLICATION, $USER;

$APPLICATION->SetTitle('Главная');

//$USER->Authorize(1);

?>

<? $APPLICATION->IncludeComponent(
    "riche:menu",
    "",
    [
        'MENU_NAME' => 'main',
        'CACHE_TIME' => 7200
    ]
);
?>

<? $APPLICATION->IncludeComponent(
    "riche:menu",
    "",
    [
        'MENU_NAME' => 'header',
        'CACHE_TIME' => 7200
    ]
);
?>

<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>