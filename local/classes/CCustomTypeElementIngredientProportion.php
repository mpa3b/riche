<?php

namespace Local;

use Bitrix\Main\Loader;
use CIBlockElement;

class CCustomTypeElementIngredientProportion
{

    //описываем поведение пользовательского свойства

    function GetUserTypeDescription()
    {

        return [
            'PROPERTY_TYPE'        => 'N',
            'USER_TYPE'            => 'ratio_percent',
            'DESCRIPTION'          => 'Соотношение состава',
            //выводится в списке типов свойств во вкладке редактирования свойств ИБ
            //необходимые функции, используемые в создаваемом типе
            'GetPropertyFieldHtml' => [__CLASS__, 'GetPropertyFieldHtml'],
            'ConvertToDB'          => [__CLASS__, 'ConvertToDB'],
            'ConvertFromDB'        => [__CLASS__, 'ConvertToDB'],
            'GetSettingsHTML'      => [__CLASS__, 'GetSettingsHTML'],
            'PrepareSettings'      => [__CLASS__, 'PrepareSettings'],
        ];
    }

    //формируем пару полей для создаваемого свойства

    function GetPropertyFieldHtml($arProperty, $value, $strHTMLControlName)
    {

        if (isset($arProperty["USER_TYPE_SETTINGS"]["IBLOCK_ID"])) {

            $iblock_id = $arProperty["USER_TYPE_SETTINGS"]["IBLOCK_ID"];

        }
        else {

            $iblock_id = "";

        }

        if (!$iblock_id) {

            $html = '<span>Выберите инфоблок для привязки в настройках свойства!</span>';

        }
        else {

            $rsPriceTypes = CIBlockElement::GetList(
                ["SORT" => "ASC"],
                [
                    "IBLOCK_ID" => 2,
                    "ACTIVE"    => "Y"
                ],
                false,
                false,
                ["ID", "NAME"]
            );

            //формируем поля селект и инпут

            $html = '<select name="' . $strHTMLControlName["DESCRIPTION"] . '">';
            $html .= '<option value="">(выберите ингредиент)</option>';

            while ($arPriceTypes = $rsPriceTypes->GetNext()) {
                $html .= '<option value="' . $arPriceTypes["ID"] . '"';
                if ($arPriceTypes["ID"] == $value["DESCRIPTION"]) {
                    $html .= 'selected="selected"';
                }
                $html .= '>' . $arPriceTypes["NAME"] . '</option>';
            }

            $html .= '</select>';
            $html .= '<input id="' . $strHTMLControlName["VALUE"] . '" name="' . $strHTMLControlName["VALUE"]
                     . '" value="' . $value["VALUE"] . '" type="text">';
            $html .= "<br/>";
        }

        return $html;

    }

    //сохраняем в базу
    function ConvertToDB($arProperty, $value)
    {

        return $value;
    }

    //читаем из базы
    function ConvertFromDB($arProperty, $value)
    {

        return $value;
    }

    function PrepareSettings($arUserField)
    {

        $iblock_id = intval($arUserField["USER_TYPE_SETTINGS"]["IBLOCK_ID"]);

        if ($iblock_id <= 0) {
            $iblock_id = "";
        }

        return [
            "IBLOCK_ID" => $iblock_id,
        ];
    }

    function GetSettingsHTML($arUserField = false, $arHtmlControl, $bVarsFromForm)
    {

        $result = '';

        if ($bVarsFromForm) {
            $iblock_id = $GLOBALS[$arHtmlControl["NAME"]]["IBLOCK_ID"];
        }
        elseif (is_array($arUserField)) {
            $iblock_id = $arUserField["USER_TYPE_SETTINGS"]["IBLOCK_ID"];
        }
        else {
            $iblock_id = "";
        }

        if (Loader::includeModule('iblock')) {
            $result .= '
			<tr>
				<td>Привязка к элементам инф. блоков:</td>
				<td>
					' . GetIBlockDropDownList(
                    $iblock_id,
                    $arHtmlControl["NAME"] . '[IBLOCK_TYPE_ID]',
                    $arHtmlControl["NAME"] . '[IBLOCK_ID]',
                    false,
                    'class="adm-detail-iblock-types"',
                    'class="adm-detail-iblock-list"'
                ) . '
				</td>
			</tr>
			';
        }
        else {
            $result .= '
			<tr>
				<td>Привязка к элементам инф. блоков:</td>
				<td>
					<input type="text" size="6" name="' . $arHtmlControl["NAME"] . '[IBLOCK_ID]" value="'
                       . htmlspecialcharsbx(
                           $iblock_id
                       ) . '">
				</td>
			</tr>
			';
        }

        return $result;

    }

}
