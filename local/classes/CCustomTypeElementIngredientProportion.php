<?php

namespace Local;

use Bitrix\Iblock\ElementTable;
use Bitrix\Main\Loader;

/**
 * Класс, реализующий самодельное свойство для ИБ типа "ссылка на элемент" с указанием количества для указания ингридиентов.
 *
 * @link https://habr.com/ru/post/697050/
 * @link https://it-svalka.ru/blog/bitrix/polzovatelskiy-tip-svoystv-infobloka-v-1s-bitriks/
 * @link https://it-svalka.ru/blog/bitrix/sobstvennyy-tip-polzovatelskikh-poley-v-1s-bitriks/
 *
 * @todo можно дополнить проверкой суммы значений, чтобы все "ингридиенты" не давали в сумме более 100%.
 */
class CCustomTypeElementIngredientProportion
{

    /**
     * описываем поведение пользовательского свойства
     *
     * @return array
     */
    static function GetUserTypeDescription()
    {

        return [
            'PROPERTY_TYPE'        => 'N', // тип данных
            'USER_TYPE'            => 'ratio_percent',
            'DESCRIPTION'          => 'Ингридиент с процентным отношением',
            //выводится в списке типов свойств во вкладке редактирования свойств ИБ
            //необходимые функции, используемые в создаваемом типе
            'GetPropertyFieldHtml' => [__CLASS__, 'GetPropertyFieldHtml'],
            'ConvertToDB'          => [__CLASS__, 'ConvertToDB'],
            'ConvertFromDB'        => [__CLASS__, 'ConvertToDB'],
            'GetSettingsHTML'      => [__CLASS__, 'GetSettingsHTML'],
            'PrepareSettings'      => [__CLASS__, 'PrepareSettings'],
        ];
    }

    /**
     * формируем пару полей для создаваемого свойства
     *
     * @param $arProperty
     * @param $value
     * @param $strHTMLControlName
     *
     * @return string
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\ObjectPropertyException
     * @throws \Bitrix\Main\SystemException
     */
    static function GetPropertyFieldHtml($arProperty, $value, $strHTMLControlName)
    {

        if (!is_set($arProperty["USER_TYPE_SETTINGS"]["IBLOCK_ID"])) {

            $html = '<span>Выберите инфоблок для привязки в настройках свойства!</span>';

        }
        else {

            $rsElements = ElementTable::getList(
                [
                    'order'  => [
                        "SORT" => "ASC"
                    ],
                    'filter' => [
                        "IBLOCK_ID" => $arProperty["USER_TYPE_SETTINGS"]["IBLOCK_ID"],
                        "ACTIVE"    => "Y"
                    ],
                    'select' => [
                        "ID",
                        "NAME"
                    ]
                ]
            );

            //формируем поля селект и инпут

            $html = '<select name="' . $strHTMLControlName["DESCRIPTION"] . '">';
            $html .= '<option value="">(выберите ингредиент)</option>';

            while ($arPriceTypes = $rsElements->fetch()) {

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


    /**
     * сохраняем в базу
     *
     * @param $arProperty
     * @param $value
     *
     * @return mixed
     */
    static function ConvertToDB($arProperty, $value)
    {
        return $value;
    }


    /**
     * читаем из базы
     *
     * @param $arProperty
     * @param $value
     *
     * @return mixed
     */
    static function ConvertFromDB($arProperty, $value)
    {

        return $value;
    }

    /**
     * подготовка настроек
     *
     * @param $arUserField
     *
     * @return string[]
     */
    static function PrepareSettings($arUserField)
    {

        $iblock_id = intval($arUserField["USER_TYPE_SETTINGS"]["IBLOCK_ID"]);

        if ($iblock_id <= 0) {
            $iblock_id = "";
        }

        return [
            "IBLOCK_ID" => $iblock_id,
        ];
    }

    /**
     * Получение внешнего вида (вёрстки) настроек.
     *
     * @param $arUserField
     * @param $arHtmlControl
     * @param $bVarsFromForm
     *
     * @return string
     * @throws \Bitrix\Main\LoaderException
     */
    static function GetSettingsHTML($arUserField = false, $arHtmlControl, $bVarsFromForm)
    {

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
            $result = '
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
            $result = '
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
