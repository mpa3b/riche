<?
if (!defined('B_PROLOG_INCLUDED') or B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Page\Asset;

if($USER->IsAdmin()) {
    Asset::getInstance()->addString('<script src="/local/assets/vue/dist/vue.global.js"></script>');
    Asset::getInstance()->addString('<script src="/local/assets/vuex/dist/vuex.global.js"></script>');

}else{
    Asset::getInstance()->addString('<script src="/local/assets/vue/dist/vue.global.prod.js"></script>');
    Asset::getInstance()->addString('<script src="/local/assets/vuex/dist/vuex.global.prod.js"></script>');
}

?>
<!DOCTYPE html>
<html>
<head>
    <?$APPLICATION->ShowHead();?>
    <title><?$APPLICATION->ShowTitle();?></title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

</head>
<body>
<div id="panel">
    <?$APPLICATION->ShowPanel();?>
</div>

