<!DOCTYPE html>
<?
if (!defined('B_PROLOG_INCLUDED') or B_PROLOG_INCLUDED !== true) {
    die();
}

global $USER, $APPLICATION;

use Bitrix\Main\Application;
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
$assets->addJs('//code.jquery.com/jquery-3.6.0.min.js');

$assets->addCss(Template::ASSETS . '/normalize-css/normalize.css');

if (Option::get('main', 'update_devsrv') == 'Y') $debug = true;

if ($debug) {

} else {

}

if ($currentDirectoryPath == '') {

    $pageHtmlClasses = 'front';

} else {

    $pageHtmlClasses = str_replace(DIRECTORY_SEPARATOR, '--', ltrim(strtolower($currentDirectoryPath), DIRECTORY_SEPARATOR));

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

    <meta http-equiv="x-dns-prefetch-control" content="on">

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

    <?= $assets->getStrings(); ?>
    <?= $assets->getCss(); ?>

    <?
    $APPLICATION->ShowHeadScripts(); ?>

</head>
<body id="page" class="<?= $pageHtmlClasses; ?>">