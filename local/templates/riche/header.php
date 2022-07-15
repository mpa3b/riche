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

$assets->addJs(SITE_TEMPLATE_PATH . '/scripts/common.js');

$assets->addCss(Template::ASSETS . '/normalize-css/normalize.css');

if (Option::get('main', 'update_devsrv') == 'Y') $debug = true;

if ($debug) {


    $assets->addJs(Template::ASSETS. '/underscore/underscore-umd.js');

} else {


    $assets->addJs(Template::ASSETS. '/underscore/underscore-umd.min.js');

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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