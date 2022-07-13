<?

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

global $APPLICATION, $USER;

$APPLICATION->SetTitle('Главная');

?>
<?$APPLICATION->IncludeComponent(
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
<section id="vue-app">
    <banner-component></banner-component>
</section>



<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>