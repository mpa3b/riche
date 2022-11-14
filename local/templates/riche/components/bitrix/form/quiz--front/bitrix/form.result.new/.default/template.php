<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Riche\Breakpoint;
use Riche\Thumb;

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
/** @var array $templateData */
/** @var CBitrixComponent $component */

$this->addExternalJs(LOCAL_ASSETS . '/slick-carousel/slick/slick.js');
$this->addExternalCss(LOCAL_ASSETS . '/slick-carousel/slick/slick.css');
$this->addExternalCss(SITE_TEMPLATE_PATH . '/styles/slick.css');

?>

<?php d($arResult); ?>

<div class="quiz-front--new default">

    <?= $arResult["FORM_NOTE"]; ?>

    <?php if ($arResult["isFormErrors"] == "Y"): ?>
        <div class="errors">
            <?= $arResult["FORM_ERRORS_TEXT"]; ?>
        </div>
    <?php endif; ?>

    <?= $arResult["FORM_HEADER"]; ?>

    <div class="fields">

        <?php if ($arResult["isFormNote"] != "Y") { ?>

            <div class="note field">

                <?php if ($arResult["isFormDescription"] == "Y" || $arResult["isFormImage"] == "Y") { ?>

                    <h3><?= $arResult["FORM_TITLE"]; ?></h3>

                    <?php if ($arResult['arForm']['DESCRIPTION_TYPE'] == 'html') { ?>
                        <?= $arResult["FORM_DESCRIPTION"]; ?>
                    <?php } else { ?>
                        <p><?= $arResult["FORM_DESCRIPTION"]; ?></p>
                    <?php } ?>

                    <?php if ($arResult["isFormImage"] == "Y") { ?>

                        <picture>

                            <?php

                            $preload = CFile::ResizeImageGet(
                                $arResult['FORM_IMAGE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['preload'], 1),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $small = CFile::ResizeImageGet(
                                $arResult['FORM_IMAGE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['small'], 1),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $mobile = CFile::ResizeImageGet(
                                $arResult['FORM_IMAGE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['mobile'], 1),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $tablet = CFile::ResizeImageGet(
                                $arResult['FORM_IMAGE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['tablet'] / 2, 1),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $desktop = CFile::ResizeImageGet(
                                $arResult['FORM_IMAGE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['desktop'] / 3, 1),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            $wide = CFile::ResizeImageGet(
                                $arResult['FORM_IMAGE']['ID'],
                                Thumb::calculateImageSize(Breakpoint::breakpoints['wide'] / 4, 1),
                                BX_RESIZE_IMAGE_EXACT
                            );

                            ?>

                            <source data-srcset="<?= $small['src']; ?>"
                                    media="<?= Breakpoint::getMedia('small'); ?>">

                            <source data-srcset="<?= $mobile['src']; ?>"
                                    media="<?= Breakpoint::getMedia('mobile'); ?>">

                            <source data-srcset="<?= $tablet['src']; ?>"
                                    media="<?= Breakpoint::getMedia('tablet'); ?>">

                            <source data-srcset="<?= $desktop['src']; ?>"
                                    media="<?= Breakpoint::getMedia('desktop'); ?>">

                            <source data-srcset="<?= $wide['src']; ?>"
                                    media="<?= Breakpoint::getMedia('wide'); ?>">

                            <img src="<?= $preload['src']; ?>"
                                 loading="lazy">

                        </picture>

                    <?php } ?>

                <?php } ?>

            </div>

        <?php } ?>

        <?php foreach ($arResult["QUESTIONS"] as $sid => $arQuestion) { ?>

            <? if ($arQuestion['FIELD_TYPE'] == 'hidden') { ?>

                <input type="hidden"
                       value=""
                       name="form_hidden_<?= $arQuestion['ID'] ?>">

            <? } else { ?>

                <div class="<?php if ($arQuestion["REQUIRED"] == "Y") { ?>required <?php } ?><?= strtolower($sid); ?> field">

                    <?= $arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />" . $arQuestion["IMAGE"]["HTML_CODE"] : ""; ?>

                    <h4><?= $arQuestion['CAPTION']; ?></h4>

                    <div class="input-wrapper">

                        <?php foreach ($arQuestion['STRUCTURE'] as $i => $arField) { ?>

                            <?php if ($arField['FIELD_TYPE'] == 'hidden') { ?>

                            <?php } else { ?>

                                <div class="input <?= $arField['FIELD_TYPE']; ?>">

                                    <?php switch ($arField['FIELD_TYPE']) {

                                        case 'text': ?>

                                            <?php if (strlen($arField['MESSAGE']) > 1) : ?>
                                                <label for="text-<?= $arField['ID'] ?>"><?= $arField['MESSAGE']; ?></label>
                                            <?php endif; ?>

                                            <?php if (strpos(strtolower($sid), 'phone')) { ?>

                                                <input type="tel"
                                                       value=""
                                                       id="text-<?= $arField['ID'] ?>"
                                                       id="text-<?= $arField['ID'] ?>"
                                                       name="form_text_<?= $arField['ID'] ?>">

                                            <?php }

                                            elseif (strpos(strtolower($sid), 'count')) { ?>

                                                <input type="number"
                                                       value=""
                                                       min="1"
                                                       id="text-<?= $arField['ID'] ?>"
                                                       name="form_text_<?= $arField['ID'] ?>">

                                            <?php }

                                            else { ?>

                                                <input type="text"
                                                       value=""
                                                       id="text-<?= $arField['ID'] ?>"
                                                       name="form_text_<?= $arField['ID'] ?>">

                                            <?php }

                                            break;

                                        case 'email': ?>

                                            <label for="email-<?= $arField['ID'] ?>"><?= $arField['MESSAGE']; ?></label>

                                            <input type="email"
                                                   value=""
                                                   id="email-<?= $arField['ID'] ?>"
                                                   name="form_email_<?= $arField['ID'] ?>">

                                            <?php break;

                                        // штатный виджет бразуера формирует дату не в понятном для форм битрикс виде

                                        case 'date': ?>

                                            <label for="date-<?= $arField['ID'] ?>"><?= $arField['MESSAGE']; ?></label>

                                            <input type="date"
                                                   value=""
                                                   min="<?= date('Y-m-d'); ?>"
                                                   id="date-<?= $arField['ID'] ?>"
                                                   name="form_date_<?= $arField['ID'] ?>"
                                                   placeholder="<?= $arField['MESSAGE']; ?>">

                                            <?php break;

                                        case 'radio': ?>

                                            <input type="radio"
                                                   id="radio-<?= $arField['ID'] ?>"
                                                   value="<?= $arField['ID'] ?>"
                                                   name="form_radio_<?= $sid ?>">

                                            <label for="radio-<?= $arField['ID'] ?>"><?= $arField['MESSAGE']; ?></label>

                                            <?php break;

                                        case 'checkbox': ?>

                                            <input type="checkbox"
                                                   id="checkbox-<?= $arField['ID'] ?>"
                                                   value="<?= $arField['ID'] ?>"
                                                   name="form_checkbox_<?= $sid ?>">

                                            <label for="checkbox-<?= $arField['ID'] ?>"><?= $arField['MESSAGE']; ?></label>

                                            <?php break;

                                        case 'textarea': ?>

                                            <label for="textarea-<?= $arField['ID'] ?>"><?= $arField['MESSAGE']; ?></label>

                                            <textarea id="textarea-<?= $arField['ID'] ?>"
                                                      name="form_textarea_<?= $arField['ID'] ?>"
                                                      rows="3"></textarea>

                                            <?php break;

                                        case 'image' :
                                        case 'file' : ?>

                                            <?php if ($i == 0) : ?>
                                                <label for="file-<?= $arField['ID'] ?>"><?= $arField['MESSAGE']; ?></label>
                                            <?php endif; ?>

                                            <input type="file"
                                                   id="file-<?= $arField['ID'] ?>"
                                                   value=""
                                                   <?php if ($arField['ACTIVE'] !== 'Y') : ?>disabled<?php endif; ?>
                                                   name="form_file_<?= $arField['ID'] ?>">

                                            <?php break;

                                        case 'multiselect' :
                                        case 'dropdown' : ?>

                                            <?php if ($i == 0) { ?>
                                                <select name="form_multiselect_<?= $sid; ?>[]" <?php if ($arField['FIELD_TYPE'] == 'multiselect') { ?> multiple <?php } ?>>
                                            <?php } ?>
                                            <option value="<?= $arField['ID']; ?>"><?= $arField['MESSAGE'] ?></option>
                                            <?php if ($i + 1 == count($arQuestion['STRUCTURE'])) { ?>
                                                </select>
                                            <?php } ?>

                                            <?php break;

                                        case 'url': ?>

                                            <?php if (!empty($arQuestion['CAPTION'])) { ?>
                                                <label for="url-<?= $sid; ?>"><?= $arQuestion['CAPTION']; ?></label>
                                            <?php } ?>

                                            <input type="url"
                                                   name="form_url_<?= $arField['ID']; ?>"
                                                   id="url-<?= $sid; ?>"
                                                   placeholder="<?= $arField['MESSAGE'] ?>"
                                                   value="<?= $arQuestion['VALUE']; ?>">

                                            <?php break;


                                    } ?>

                                </div>

                            <?php } ?>

                        <?php } ?>

                    </div>

                </div>

            <? } ?>

        <?php } ?>

        <?php if ($arResult["isUseCaptcha"] == "Y") { ?>

            <div class="captcha field">

                <?= GetMessage("FORM_CAPTCHA_TABLE_TITLE") ?>

                <input type="hidden" name="captcha_sid"
                       value="<?= htmlspecialcharsbx($arResult["CAPTCHACode"]); ?>"/><img
                        src="/bitrix/tools/captcha.php?captcha_sid=<?= htmlspecialcharsbx($arResult["CAPTCHACode"]); ?>"
                        width="180" height="40"/>
                <?= GetMessage("FORM_CAPTCHA_FIELD_TITLE") ?><?= $arResult["REQUIRED_SIGN"]; ?>

                <input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext"/>

            </div>

        <?php } ?>

        <div class="actions field">

            <input disabled
                   type="submit"
                   name="web_form_submit"
                   value="<?= htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]); ?>"/>

        </div>

    </div>

    <div class="controls">

        <button class="arrow transparent prev" type="button">
            <i class="icon-chevron-left"></i>
        </button>

        <button class="arrow transparent next" type="button">
            <i class="icon-chevron-right"></i>
        </button>

    </div>

    <?= $arResult["FORM_FOOTER"]; ?>

</div>
