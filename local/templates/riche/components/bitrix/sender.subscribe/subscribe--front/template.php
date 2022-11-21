<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
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

$frame = $this->createFrame("sender-subscribe", false);

?>

<div class="subscribe--front">

    <? $frame->begin(); ?>

    <div class="wrapper">

            <h2>Больше вкусного контента</h2>
            <p>В наших рассылках.<br>
                Получи <strong>скидку 10%</strong> на первый заказ на сайте, <strong>50&nbsp;баллов </strong>RICHE в
                личном кабинете и всё это за подписку на наш вкусный и полезный контент.</p>

            <form role="form"
                  method="post"
                  action="<?= $arResult["FORM_ACTION"] ?>">

                <?= bitrix_sessid_post() ?>

                <input type="hidden" name="sender_subscription" value="add">

                <input type="email"
                       name="SENDER_SUBSCRIBE_EMAIL"
                       value="<?= $arResult["EMAIL"] ?>"
                       title="Твой email"
                       placeholder="you@email.ru">

                <? if (!empty($arResult["RUBRICS"])) { ?>

                    <? if (count($arResult["RUBRICS"]) > 0) { ?>
                        Тут заголовок какой-то
                    <? } ?>

                    <ul class="options">

                        <? foreach ($arResult["RUBRICS"] as $itemID => $itemValue): ?>

                            <li>

                                <input type="checkbox"
                                       name="SENDER_SUBSCRIBE_RUB_ID[]"
                                       id="SENDER_SUBSCRIBE_RUB_ID_<?= $itemValue["ID"] ?>"
                                    <? if ($itemValue["CHECKED"]) echo " checked" ?>
                                       value="<?= $itemValue["ID"] ?>">

                                <label for="SENDER_SUBSCRIBE_RUB_ID_<?= $itemValue["ID"] ?>"><?= htmlspecialcharsbx($itemValue["NAME"]) ?></label>

                            </li>

                        <? endforeach; ?>

                    </ul>

                <? } ?>

                <button>Подпишись</button>

            </form>

            <? if (($arParams['USER_CONSENT'] ?? '') == 'Y' && $arParams['AJAX_MODE'] <> 'Y') { ?>

                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.userconsent.request",
                    "",
                    [
                        "ID"            => $arParams["USER_CONSENT_ID"],
                        "IS_CHECKED"    => $arParams["USER_CONSENT_IS_CHECKED"],
                        "AUTO_SAVE"     => "Y",
                        "IS_LOADED"     => $arParams["USER_CONSENT_IS_LOADED"],
                        "ORIGIN_ID"     => "sender/sub",
                        "ORIGINATOR_ID" => "",
                        "REPLACE"       => [
                            "button_caption" => "Подпшись",
                            "fields"         => ["Твой email"]
                        ],
                    ]
                ); ?>

            <? } ?>

    </div>

    <? $frame->end(); ?>

</div>
