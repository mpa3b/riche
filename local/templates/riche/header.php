<!DOCTYPE html>
<?
    if (!defined('B_PROLOG_INCLUDED') or B_PROLOG_INCLUDED !== true) {
        die();
    }
    
    global $USER, $APPLICATION;
    
    use Bitrix\Main\Page\Asset;
    use Bitrix\Main\Page\AssetLocation;
    
    if ($USER->IsAdmin()) {
        Asset::getInstance()->addString('<script src="/local/assets/vue/dist/vue.global.js"></script>');
        Asset::getInstance()->addString('<script src="/local/assets/vuex/dist/vuex.global.js"></script>');
        
    }
    else {
        Asset::getInstance()->addString('<script src="/local/assets/vue/dist/vue.global.prod.js"></script>');
        Asset::getInstance()->addString('<script src="/local/assets/vuex/dist/vuex.global.prod.js"></script>');
    }

?>
<html lang="<?= LANGUAGE_ID ?>">
<head>
    <title><?
            $APPLICATION->ShowTitle(); ?></title>

    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>

    <meta http-equiv="Content-Type" content="text/html; charset=<?= strtolower(SITE_CHARSET); ?>">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, viewport-fit=cover">

    <script data-skip-moving="true">
        var BX        = {
                message : () => {
                    return false;
                },
                ready :   () => {
                    return false;
                }
            },
            bxSession = {
                Expand : () => {
                    return false;
                }
            };
    </script>
    
    <?= Asset::getInstance()->getStrings(); ?>
    
    <?
        $APPLICATION->ShowHeadScripts();
        $APPLICATION->ShowCSS(true, false); // Output css site styles
    ?>

</head>
<body>

<?
    $APPLICATION->IncludeComponent(
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
                        'name' => 'Тело'],
            
            ]
        ]
    );
?>
