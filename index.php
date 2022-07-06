<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
global $APPLICATION;
$APPLICATION->SetTitle('Главная');
?>
<?
$APPLICATION->IncludeComponent(
    "riche:banner",
    "",
    []
);?>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>