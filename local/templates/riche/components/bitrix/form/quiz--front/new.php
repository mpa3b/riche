<?

    if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
        die();
    }

    /** @var array $arParams */
    /** @var array $arResult */
    /** @global \CMain $APPLICATION */
    /** @global \CUser $USER */
    /** @global \CDatabase $DB */
    /** @var \CBitrixComponentTemplate $this */
    /** @var string $templateName */
    /** @var string $templateFile */
    /** @var string $templateFolder */
    /** @var string $componentPath */
    /** @var array $templateData */

    /** @var \CBitrixComponent $component */

    use Riche\Template;

    $this->setFrameMode(true);

    $frame = $this->createFrame();

    $this->addExternalJs(Template::ASSETS . '/inputmask/dist/jquery.inputmask.js');
    $this->addExternalJs(Template::ASSETS . '/jquery-colorbox/jquery.colorbox.js');

?>

<div class="hidden">

    <div class="quiz--front">

        <? $frame->begin(); ?>

        <div class="quiz--front--new">

            <? $APPLICATION->IncludeComponent("bitrix:form.result.new", "", $arParams, $component); ?>

        </div>

        <? $frame->end(); ?>

    </div>

</div>
