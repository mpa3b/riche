<?

    if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED != true) {
        die();
    }

    use Riche\Images;
    use Riche\Template;

    $this->addExternalJs(Template::ASSETS . '/tiny-slider/dist/min/tiny-slider.js');
    $this->addExternalCss(Template::ASSETS . '/tiny-slider/dist/tiny-slider.css');

    $this->addExternalJs(Template::ASSETS . '/inputmask/dist/jquery.inputmask.js');

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

?>

<div class="quiz--front--new--default <?= strtolower($arResult['WEB_FORM_NAME']); ?>"
     data-webform-sid="<?= $arResult['WEB_FORM_NAME']; ?>">

    <div class="wrapper">

        <?= $arResult["FORM_HEADER"]; ?>

        <?= bitrix_sessid_post() ?>

        <? if ($arResult["isFormErrors"] == "Y") { ?>

            <div class="errors">
                <?= $arResult["FORM_ERRORS_TEXT"]; ?>
            </div>

        <? } ?>

        <h2><?= $arResult['arForm']['NAME']; ?></h2>

        <div class="slider">

            <? if (!empty($arResult["FORM_DESCRIPTION"])) { ?>

                <div class="details">

                    <div>
                        <?= $arResult["FORM_DESCRIPTION"]; ?>
                    </div>

                    <button class="wide big primary button next">Пройти опрос</button>

                </div>

            <? } ?>

            <? if (!empty($arResult["FORM_NOTE"])) { ?>

                <div class="note">
                    <?= $arResult["FORM_NOTE"]; ?>
                </div>

            <? } ?>

            <? foreach ($arResult["QUESTIONS"] as $sid => $arQuestion) { ?>

                <? $sid = strtolower($sid); ?>

                <div class="field <?= $sid;
                    if ($arQuestion['REQUIRED'] == 'Y') { ?> required<? } ?>">

                    <? foreach ($arQuestion['STRUCTURE'] as $i => $arField) { ?>

                        <? switch ($arField['FIELD_TYPE']) {

                            case 'text': ?>

                                <? if (strpos(strtolower($sid), 'phone')) { ?>

                                    <? if (!empty($arQuestion['CAPTION'])) { ?>
                                        <h3 for="<?= $sid; ?>"><?= $arQuestion['CAPTION']; ?></h3>
                                    <? } ?>

                                    <input type="tel"
                                           id="<?= $sid; ?>"
                                           name="form_text_<?= $arField['ID']; ?>"
                                           placeholder="<?= $arField['MESSAGE']; ?>"
                                           <? if ($arQuestion['REQUIRED'] == 'Y') { ?>required<? } ?>
                                           value="<?= $arQuestion['VALUE']; ?>">

                                <? } else { ?>

                                    <? if (!empty($arQuestion['CAPTION'])) { ?>
                                        <label for="<?= $sid; ?>"><?= $arQuestion['CAPTION']; ?></label>
                                    <? } ?>

                                    <input type="text"
                                           id="<?= $sid; ?>"
                                           name="form_text_<?= $arField['ID']; ?>"
                                           placeholder="<?= $arField['MESSAGE']; ?>"
                                           <? if ($arQuestion['REQUIRED'] == 'Y') { ?>required<? } ?>
                                           value="<?= $arQuestion['VALUE']; ?>">

                                <? } ?>

                                <? break;

                            case 'email': ?>

                                <? if (!empty($arQuestion['CAPTION'])) { ?>
                                    <h3 for="<?= $sid; ?>"><?= $arQuestion['CAPTION']; ?></h3>
                                <? } ?>

                                <input type="text"
                                       id="<?= $sid; ?>"
                                       name="form_email_<?= $arField['ID']; ?>"
                                       placeholder="<?= $arField['MESSAGE']; ?>"
                                       <? if ($arQuestion['REQUIRED'] == 'Y') { ?>required<? } ?>
                                       value="<?= $arQuestion['VALUE']; ?>">

                                <? break;

                            case 'url': ?>

                                <? if (!empty($arQuestion['CAPTION'])) { ?>
                                    <h3 for="<?= $sid; ?>"><?= $arQuestion['CAPTION']; ?></h3>
                                <? } ?>

                                <input type="url"
                                       id="<?= $sid; ?>"
                                       name="form_url_<?= $arField['ID']; ?>"
                                       placeholder="<?= $arField['MESSAGE']; ?>"
                                       <? if ($arQuestion['REQUIRED'] == 'Y') { ?>required<? } ?>
                                       value="<?= $arQuestion['VALUE']; ?>">

                                <? break;

                            case 'date': ?>

                                <? if (!empty($arQuestion['CAPTION'])) { ?>
                                    <h3 for="<?= $sid; ?>"><?= $arQuestion['CAPTION']; ?></h3>
                                <? } ?>

                                <input type="date"
                                       id="<?= $sid; ?>"
                                       name="form_date_<?= $arField['ID']; ?>"
                                       placeholder="<?= $arField['MESSAGE']; ?>"
                                       <? if ($arQuestion['REQUIRED'] == 'Y') { ?>required<? } ?>
                                       value="<?= $arQuestion['VALUE']; ?>">

                                <? break;

                            case 'textarea': ?>

                                <? if (!empty($arQuestion['CAPTION'])) { ?>
                                    <h3 for="<?= $sid; ?>"><?= $arQuestion['CAPTION']; ?></h3>
                                <? } ?>

                                <textarea name="form_textarea_<?= $arField['ID']; ?>"
                                          id="<?= $sid; ?>"
                                          placeholder="<?= $arField['MESSAGE']; ?>"
                                          <? if ($arQuestion['REQUIRED'] == 'Y') { ?>required<? } ?>></textarea>

                                <? break;

                            case 'hidden': ?>

                                <input type="hidden"
                                       id="<?= strtolower($sid); ?>"
                                       name="form_hidden_<?= $arField['ID']; ?>"
                                       <? if ($arQuestion['REQUIRED'] == 'Y') { ?>required<? } ?>
                                       value="<?= $arQuestion['VALUE']; ?>">

                                <? break;

                            case 'radio': ?>

                                <? if ($i == 0 && !empty($arQuestion['CAPTION'])) { ?>
                                    <h3><?= $arQuestion['CAPTION']; ?></h3>
                                <? } ?>

                                <div class="radio-input option">
                                    <input type="radio"
                                           id="radio-<?= $arField['ID']; ?>"
                                           name="form_radio_<?= $sid; ?>"
                                           <? if ($arQuestion['REQUIRED'] == 'Y') { ?>required<? } ?>
                                           value="<?= $arField['ID']; ?>">
                                    <label for="radio-<?= $arField['ID']; ?>"><?= $arField['MESSAGE']; ?></label>
                                </div>

                                <? break;

                            case 'checkbox': ?>

                                <? if ($i == 0 && !empty($arQuestion['CAPTION'])) { ?>
                                    <h3><?= $arQuestion['CAPTION']; ?></h3>
                                <? } ?>

                                <div class="checkbox-input option">
                                    <input type="checkbox"
                                           id="checkbox-<?= $arField['ID']; ?>"
                                           name="checkbox_<?= $sid; ?>[]"
                                           <? if ($arQuestion['REQUIRED'] == 'Y') { ?>required<? } ?>
                                           value="<?= $arField['ID']; ?>">
                                    <label for="checkbox-<?= $arField['ID']; ?>"><?= $arField['MESSAGE']; ?></label>
                                </div>

                                <? break;

                            case 'dropdown':
                            case 'multiselect': ?>

                                <? if ($i == 0 && !empty($arQuestion['CAPTION'])) { ?>
                                    <label for="<?= $sid; ?>"><?= $arQuestion['CAPTION']; ?></label>
                                <? } ?>
                                <? if ($i == 0) { ?>
                                    <select id="<?= $sid; ?>" name="form_multiselect_<?= $sid; ?>[]"
                                    <? if ($arField['FIELD_TYPE'] == 'multiselect') { ?> multiple <? } ?>>
                                <? } ?>
                                <option value="<?= $arField['ID']; ?>"><?= $arField['MESSAGE']; ?></option>
                                <? if ($i + 1 == count($arQuestion['STRUCTURE'])) { ?>
                                    </select>
                                <? } ?>

                                <? break;

                        } ?>

                    <? } ?>

                </div>

            <? } ?>

            <? if ($arResult["isUseCaptcha"] == "Y") { ?>

                <div class="captcha field">

                    <label for="captcha"><?= GetMessage("FORM_CAPTCHA_TABLE_TITLE") ?></label>

                    <div id="captcha" class="captcha-input">

                        <input type="hidden"
                               name="captcha_sid"
                               value="<?= htmlspecialcharsbx($arResult["CAPTCHACode"]); ?>"/>

                        <img
                            src="/bitrix/tools/captcha.php?captcha_sid=<?= htmlspecialcharsbx($arResult["CAPTCHACode"]); ?>"/>

                        <?= GetMessage("FORM_CAPTCHA_FIELD_TITLE") ?>

                        <input type="text" name="captcha_word" value=""/>

                    </div>

                </div>

            <? } ?>

            <div class="actions">

                <button class="wide primary big button rounded submit"><?= $arResult["arForm"]["BUTTON"]; ?></button>

                <input type="hidden" name="web_form_submit" value="Y">
                <input type="hidden" name="web_form_apply" value="Y">

            </div>

        </div>

        <? /*

        <div class="slider--controls">

            <button class="prev transparent button">
                <i class="iconly arrow-left-2"></i>
            </button>

            <button class="next transparent button">
                <i class="iconly arrow-right-2"></i>
            </button>

        </div>

        */ ?>

        <?= $arResult["FORM_FOOTER"]; ?>

        <? if (!empty($arResult['FORM_IMAGE'])) { ?>

            <?

            $formImageMobile = CFile::ResizeImageGet(
                $arResult['FORM_IMAGE']['ID'],
                Images::calculateImageSize(Images::BREAKPOINTS['mobile'], 1),
                BX_RESIZE_IMAGE_EXACT,
                false,
                [],
                false
            );

            Images::getWebP($formImageMobile);

            $formImage = CFile::ResizeImageGet(
                $arResult['FORM_IMAGE']['ID'],
                Images::calculateImageSize(Images::BREAKPOINTS['desktop'] / 2, 1),
                BX_RESIZE_IMAGE_EXACT,
                false,
                [],
                false
            );

            Images::getWebP($formImage);

            $formImagePreload = CFile::ResizeImageGet(
                $arResult['FORM_IMAGE']['ID'],
                Images::calculateImageSize(32, 1),
                BX_RESIZE_IMAGE_EXACT,
                false,
                [],
                false
            );

            ?>

            <picture class="wrapper--background">

                <? if ($formImageMobile['webp_src']) { ?>
                    <source srcset="<?= $formImageMobile['webp_src']; ?>"
                            type="<?= $formImageMobile['webp_content_type']; ?>"
                            media="<?= Images::getMedia('mobile', true); ?>">
                <? } ?>

                <source srcset="<?= $formImage["src"]; ?>"
                        type="<?= $formImage['content_type']; ?>"
                        media="<?= Images::getMedia('mobile', true); ?>">

                <? if ($formImage['webp_src']) { ?>
                    <source srcset="<?= $formImage['webp_src']; ?>"
                            type="<?= $formImage['webp_content_type']; ?>"
                            media="<?= Images::getMedia('mobile'); ?>">
                <? } ?>

                <source srcset="<?= $formImage["src"]; ?>"
                        type="<?= $formImage['content_type']; ?>"
                        media="<?= Images::getMedia('mobile'); ?>">

                <img src="<?= $formImagePreload['src']; ?>"
                     loading="lazy">

            </picture>

        <? } ?>

    </div>

</div>
