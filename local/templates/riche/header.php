<!DOCTYPE html>
<?php if (!defined('B_PROLOG_INCLUDED') or B_PROLOG_INCLUDED !== true) die();

global $USER, $APPLICATION;

use Bitrix\Main\Application;
use Bitrix\Main\Loader;
use Bitrix\Main\Page\Asset;
use Riche\PreloadLinks;
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


if (DEBUG) {

    $assets->addCss(Template::ASSETS . '/normalize-css/normalize.css');
    $assets->addJs(Template::ASSETS . '/jquery/dist/jquery.min.js');

} else {

    PreloadLinks::preconnectDomain('cdnjs.cloudflare.com');

    PreloadLinks::addHeadPrefetchAsset('https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css');
    PreloadLinks::addHeadPrefetchAsset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js');

    PreloadLinks::addHeadPreloadAsset('https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css');
    PreloadLinks::addHeadPreloadAsset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js');

    $assets->addString('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />');
    $assets->addString('<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>');

}

$assets->addJs(SITE_TEMPLATE_PATH . '/scripts/common.js');
$assets->addCss(SITE_TEMPLATE_PATH . '/styles/common.css');

$currentDirectoryPath = Application::getInstance()->getContext()->getRequest()->getRequestedPageDirectory();

if ($currentDirectoryPath == '') {

    $pageHtmlClasses = 'front';

} else {

    $pageHtmlClasses = str_replace(DIRECTORY_SEPARATOR, '--', ltrim(strtolower($currentDirectoryPath), DIRECTORY_SEPARATOR));

}
?>
<html lang="<?= LANGUAGE_ID ?>">
<head>

    <title><?php $APPLICATION->ShowTitle(); ?></title>

    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>

    <meta http-equiv="Content-Type" content="text/html; charset=<?= strtolower(SITE_CHARSET); ?>">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, viewport-fit=cover">

    <meta http-equiv="x-dns-prefetch-control" content="on">

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
    <?= $assets->getCss(); ?>

    <?php $APPLICATION->ShowHeadScripts(); ?>

</head>

<body id="page" class="<?= $pageHtmlClasses; ?>">