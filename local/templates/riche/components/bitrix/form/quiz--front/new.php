<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */

/** @var CBitrixComponent $component */

use Bitrix\Main\Application;

$request = Application::getInstance()->getContext()->getRequest();

$this->setFrameMode(true);

$frame = $this->createFrame();

?>

<div class="quiz--front">

    <? $frame->begin(); ?>

    <? if ($request->get('formresult') !== 'addok' || $request->get('WEB_FORM_ID') !== $arParams['WEB_FORM_ID']) { ?>

        <? $APPLICATION->IncludeComponent("bitrix:form.result.new", ".default", $arParams, $component); ?>

    <? } else { ?>

        <div class="quiz--front--success">

            <h2>Успешно!</h2>

            <p>У нас всё получилось!</p>

        </div>

    <? } ?>

    <? $frame->beginStub(); ?>

    <? $frame->end(); ?>

</div>
