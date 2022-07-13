<?

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

global $APPLICATION, $USER;

$APPLICATION->SetTitle('Главная');

?>
<? $menuComponent = $APPLICATION->IncludeComponent(
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
<?$bannerComponent = $APPLICATION->IncludeComponent(
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
    <menu-component v-bind:items='<?=$menuComponent['vue-props']?>'></menu-component>
    <banner-component :items='<?=$bannerComponent['vue-props']?>'></banner-component>
</section>



<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>