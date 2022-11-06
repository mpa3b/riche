<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');

/** @global CMain $APPLICATION */
$APPLICATION->SetTitle('Главная');

?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'banner--front',
    [
        'IBLOCK_TYPE' => 'CONTENT',
        'IBLOCK_ID' => 1,
    ]
); ?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'features--front',
    []
); ?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'about--front',
    []
); ?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'problems--front',
    []
); ?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'articles--front',
    []
); ?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:form',
    'quiz--front',
    []
); ?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:catalog.top',
    'catalog--front',
    []
); ?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'reviews--front',
    []
); ?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'offer--front',
    []
); ?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:subscribe.form',
    'subscribe--front',
    []
); ?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
