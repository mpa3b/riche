<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Application;

/** @global \CMain $APPLICATION */
/** @global \CUser $USER */

/** @global \Bitrix\Main\Component\ $component */
/** @global $arParams */

$this->addExternalJs(LOCAL_ASSETS . '/slick-carousel/slick/slick.js');
$this->addExternalCss(LOCAL_ASSETS . '/slick-carousel/slick/slick.css');
$this->addExternalCss(SITE_TEMPLATE_PATH . '/styles/slick.css');

$request = Application::getInstance()->getContext()->getRequest();

$frame = $this->createFrame();

?>

<div class="quiz--front">

    <? $frame->begin(); ?>

    <? if ($request->get('formresult') !== 'addok' || $request->get('WEB_FORM_ID') !== $arParams['WEB_FORM_ID']) { ?>

        <? $APPLICATION->IncludeComponent("bitrix:form.result.new", ".default", $arParams, $component); ?>

    <? } else { ?>

        <div class="form--calculator--success">

            <h2>Успешно!</h2>

            <p>У нас всё получилось!</p>

        </div>

    <? } ?>

    <? $frame->end(); ?>

</div>
