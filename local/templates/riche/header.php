<!DOCTYPE html>
<?
if (!defined('B_PROLOG_INCLUDED') or B_PROLOG_INCLUDED !== true) {
    die();
}

global $USER, $APPLICATION;

use Bitrix\Main\Config\Option;
use Bitrix\Main\Loader;
use Bitrix\Main\Page\Asset;
use Riche\Template;

Loader::registerAutoLoadClasses(
    null,
    [
        'Riche\PreloadLinks' => SITE_TEMPLATE_PATH . '/classes/PreloadLinks.php',
        'Riche\Template'     => SITE_TEMPLATE_PATH . '/classes/Template.php',
        'Riche\Images'       => SITE_TEMPLATE_PATH . '/classes/Images.php'
    ]
);

$assets = Asset::getInstance();

$assets->addCss(Template::ASSETS . '/normalize-css/normalize.css');

if (Option::get('main', 'update_devsrv') == 'Y') $debug = true;

if ($debug) {

    $assets->addJs(Template::ASSETS . '/vue/dist/vue.global.js');
    $assets->addJs(Template::ASSETS . '/vuex/dist/vuex.global.js');

} else {

    $assets->addJs(Template::ASSETS . '/vuex/dist/vuex.global.prod.js');
    $assets->addJs(Template::ASSETS . '/vuex/dist/vuex.global.prod.js');

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
                message: () => {
                    return false;
                },
                ready  : () => {
                    return false;
                }
            },
            bxSession = {
                Expand: () => {
                    return false;
                }
            };
    </script>

    <?= $assets->getStrings(); ?>

    <? $APPLICATION->ShowHeadScripts(); ?>

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
                'name' => 'Тело'
            ]
        ]
    ]
);
?>
