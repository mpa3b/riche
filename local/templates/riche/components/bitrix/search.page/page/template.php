<? use AkBars\Images;

if (!defined("B_PROLOG_INCLUDED") or B_PROLOG_INCLUDED !== true) {
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

$this->setFrameMode(true);

$frame = $this->createFrame();

?>

<div class="search-page">

    <? $frame->begin(); ?>

    <div class="wrap">

        <div class="form">

            <form>

                <? if ($arParams["USE_SUGGEST"] === "Y") { ?>

                    <?

                    if (mb_strlen($arResult["REQUEST"]["~QUERY"]) and is_object($arResult["NAV_RESULT"])) {

                        $arResult["FILTER_MD5"] = $arResult["NAV_RESULT"]->GetFilterMD5();
                        $obSearchSuggest        =
                            new CSearchSuggest($arResult["FILTER_MD5"], $arResult["REQUEST"]["~QUERY"]);
                        $obSearchSuggest->SetResultCount($arResult["NAV_RESULT"]->NavRecordCount);

                    }

                    ?>

                    <? $APPLICATION->IncludeComponent(
                        "bitrix:search.suggest.input",
                        "",
                        [
                            "NAME"          => "q",
                            "VALUE"         => $arResult["REQUEST"]["~QUERY"],
                            "INPUT_SIZE"    => 40,
                            "DROPDOWN_SIZE" => 10,
                            "FILTER_MD5"    => $arResult["FILTER_MD5"],
                        ],
                        $component,
                        ["HIDE_ICONS" => "Y"]
                    ); ?>

                <? } else { ?>

                    <input type="search"
                           name="q"
                           value="<?= $arResult["REQUEST"]["QUERY"]; ?>"
                           placeholder="Поиск"/>

                <? } ?>

                <input type="hidden" name="how" value="<?= $arResult["REQUEST"]["HOW"] == "d" ? "d" : "r" ?>"/>

                <button class="transparent search button" type="submit">
                    <i class="icon search"></i>
                </button>

            </form>

        </div>

        <div class="result">

            <? if ($arResult["ERROR_CODE"] != 0) { ?>

                <div class="search-error">

                    <h2><?= GetMessage("SEARCH_ERROR") ?></h2>
                    <p><? ShowError($arResult["ERROR_TEXT"]); ?></p>

                </div>

            <? } else {
                if (count($arResult["SEARCH"]) > 0) { ?>

                    <? if ($arParams["DISPLAY_TOP_PAGER"] != "N") {
                        echo $arResult["NAV_STRING"];
                    } ?>

                    <ul class="items">

                        <? foreach ($arResult["SEARCH"] as $arItem) { ?>

                            <li>

                                <? if (!empty($arItem['PREVIEW_PICTURE'])) { ?>

                                    <?

                                    $image_preload = CFile::resizeImageGet(
                                        $arItem['PREVIEW_PICTURE'],
                                        Images::calculateImageSize(32, 1),
                                        BX_RESIZE_IMAGE_PROPORTIONAL,
                                        false,
                                        [],
                                        false,
                                        Images::JPEG_QUALITY_PRELOAD
                                    );

                                    $image_mobile = CFile::resizeImageGet(
                                        $arItem['PREVIEW_PICTURE'],
                                        Images::calculateImageSize(70, 1),
                                        BX_RESIZE_IMAGE_PROPORTIONAL,
                                        false,
                                        [],
                                        false,
                                        Images::JPEG_QUALITY
                                    );

                                    $image = CFile::resizeImageGet(
                                        $arItem['PREVIEW_PICTURE'],
                                        Images::calculateImageSize(90, 1),
                                        BX_RESIZE_IMAGE_PROPORTIONAL,
                                        false,
                                        [],
                                        false,
                                        Images::JPEG_QUALITY
                                    );

                                    ?>

                                    <picture>

                                        <source srcset="<?= $image_mobile['src']; ?>"
                                                media="<?= Images::getMedia('mobile', true); ?>">
                                        <source srcset="<?= $image['src']; ?>"
                                                media="<?= Images::getMedia('mobile'); ?>">

                                        <img src="<?= $image_preload['src']; ?>"
                                             alt="<?= $arItem['NAME']; ?>"
                                             loading="lazy">

                                    </picture>

                                <? } ?>

                                <a href="<?= $arItem["URL"]; ?>"><?= $arItem["TITLE_FORMATED"]; ?></a>

                                <? /*

                                        <p><?= $arItem["BODY_FORMATED"]; ?></p>

                                        <? if ($arParams["SHOW_RATING"] == "Y" and $arItem["RATING_TYPE_ID"] <> '' &&
                                               $arItem["RATING_ENTITY_ID"] > 0) { ?>

                                            <div class="search-item-rate">

                                                <? $APPLICATION -> IncludeComponent(
                                                        "bitrix:rating.vote", $arParams["RATING_TYPE"],
                                                        ["ENTITY_TYPE_ID"       => $arItem["RATING_TYPE_ID"],
                                                         "ENTITY_ID"            => $arItem["RATING_ENTITY_ID"],
                                                         "OWNER_ID"             => $arItem["USER_ID"],
                                                         "USER_VOTE"            => $arItem["RATING_USER_VOTE_VALUE"],
                                                         "USER_HAS_VOTED"       => $arItem["RATING_USER_VOTE_VALUE"] == 0 ? 'N' : 'Y',
                                                         "TOTAL_VOTES"          => $arItem["RATING_TOTAL_VOTES"],
                                                         "TOTAL_POSITIVE_VOTES" => $arItem["RATING_TOTAL_POSITIVE_VOTES"],
                                                         "TOTAL_NEGATIVE_VOTES" => $arItem["RATING_TOTAL_NEGATIVE_VOTES"],
                                                         "TOTAL_VALUE"          => $arItem["RATING_TOTAL_VALUE"],
                                                         "PATH_TO_USER_PROFILE" => $arParams["~PATH_TO_USER_PROFILE"],],
                                                        $component,
                                                        ["HIDE_ICONS" => "Y"]
                                                ); ?>

                                            </div>

                                        <? } ?>

                                        <p><?= GetMessage("SEARCH_MODIFIED") ?> <?= $arItem["DATE_CHANGE"]; ?></p>

                                        <? if ($arItem["CHAIN_PATH"]) { ?>
                                            <p><?= GetMessage("SEARCH_PATH") ?>&nbsp;<?= $arItem["CHAIN_PATH"]; ?></p>
                                        <? } ?>

                                        */ ?>

                                <? if (!empty($arItem['PRICE'])) { ?>

                                    <div class="price">

                                        <div class="label">
                                            Цена
                                            <? if ($arItem['MEASURE']) { ?>
                                                за <?= $arItem['MEASURE']['SYMBOL']; ?>
                                            <? } ?>
                                        </div>

                                        <div class="value">
                                            <?= CurrencyFormat($arItem['PRICE']['VALUE'], $arItem['PRICE']['CURRENCY']); ?>
                                        </div>

                                    </div>

                                <? } ?>

                            </li>

                        <? } ?>

                    </ul>

                    <? if ($arParams["DISPLAY_BOTTOM_PAGER"] != "N") {
                        echo $arResult["NAV_STRING"];
                    } ?>

                    <menu>

                        <? if ($arResult["REQUEST"]["HOW"] == "d") { ?>

                            <a href="<?= $arResult["URL"]; ?>&amp;how=r<?= $arResult["REQUEST"]["FROM"] ?
                                '&amp;from=' . $arResult["REQUEST"]["FROM"] :
                                '' ?><?= $arResult["REQUEST"]["TO"] ?
                                '&amp;to=' . $arResult["REQUEST"]["TO"] :
                                '' ?>"><?= GetMessage("SEARCH_SORT_BY_RANK") ?></a>

                            <strong><?= GetMessage("SEARCH_SORTED_BY_DATE") ?></strong>

                        <? } else { ?>

                            <strong><?= GetMessage("SEARCH_SORTED_BY_RANK") ?></strong>

                            <a href="<?= $arResult["URL"]; ?>&amp;how=d<?= $arResult["REQUEST"]["FROM"] ?
                                '&amp;from=' . $arResult["REQUEST"]["FROM"] :
                                '' ?><?= $arResult["REQUEST"]["TO"] ?
                                '&amp;to=' . $arResult["REQUEST"]["TO"] :
                                '' ?>"><?= GetMessage("SEARCH_SORT_BY_DATE") ?></a>

                        <? } ?>

                    </menu>

                <? } else { ?>

                    <? ShowNote(GetMessage("SEARCH_NOTHING_TO_FOUND")); ?>

                <? }
            } ?>

        </div>

    </div>

    <? $frame->end(); ?>

</div>
