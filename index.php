<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
global $APPLICATION;
$APPLICATION->SetTitle('Главная');
global $USER;
$USER->Authorize(1);
?>
<?
$APPLICATION->IncludeComponent(
    "riche:banner",
    "",
    [
        'BLOCK_ID' => 'header_banner',
        'FIELDS' => [
            'ID',
            'NAME',
            'PREVIEW_TEXT',
            'DETAIL_TEXT',
        ]
    ]
);?>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>