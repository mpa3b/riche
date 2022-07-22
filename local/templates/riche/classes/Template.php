<?php

namespace Riche;

if (!defined('B_PROLOG_INCLUDED') or B_PROLOG_INCLUDED !== true) {
    die();
}

class Template
{

    /**
     * Глобальная константа времени кеширования
     */
    public const CACHE_TIME = 10000;

    /**
     * Константы шаблона, адреса, ссылки
     */

    public const ASSETS = '/local/assets';
    /**
     * Функция сопоставляет полученное слово и число
     * и из массива предустановленных значений возвращает строку
     * в склонении для множественного числа
     *
     * @param float  $value целочисловое значение, например 12345
     * @param string $unit  единица измерения во множественном числе родительном падеже, например "рублей"
     *
     * @return string
     */

    const UNITS = [
        'рубль'       => ['рубль', 'рубля', 'рублей'],
        'товар'       => ['товар', 'товара', 'товаров'],
        'новый товар' => ['новый товар', 'нового товара', "новых товаров"],
        'раздел'      => ['раздел', 'раздела', "разделов"],
        'клиент'      => ['клиент', 'клиента', "клиентов"],
        'посетитель'  => ['посетитель', 'посетителя', "посетителей"],
        'штука'       => ['штука', 'штуки', "штук"],
        'упаковка'    => ['упаковка', 'упаковки', "упаковок"],
        'коробка'     => ['коробка', 'коробки', "коробок"],
        'процент'     => ['процент', 'процента', "процентов"],
        'килограмм'   => ['килограмм', 'килограмма'],
        'грамм'       => ['грамм', 'грамма', "грамм"],
        'миллиграмм'  => ['миллиграмм', 'миллиграмма', "миллиграмм"],
        'вариант'     => ['вариант', 'варианта', "вариантов"]
    ];

    /**
     * Функция оцистки номера телефона от лишних символов, возвращает строго цифры.
     *
     * @param string $phone
     *
     * @return string
     */

    public static function cleansePhoneNumber(string $phone): string
    {

        return preg_replace('/[^0-9]/', '', $phone);

    }

    public static function pluralUnits(string $value, string $unit): string
    {

        $unit = self::UNITS[$unit];

        if ($value >= 10 and $value <= 20) {

            $plural = $unit[3];

        } else {

            switch (intval(substr($value, -1))) :
                case 1:
                    $plural = $unit[0];
                    break;
                case 2:
                case 3:
                case 4:
                    $plural = $unit[1];
                    break;
                case 5:
                case 6:
                case 7:
                case 8:
                case 9:
                case 0:
                    $plural = $unit[2];
                    break;
            endswitch;

        }

        return $value . '&nbsp;' . $plural;

    }

    public static function cleanProtocol($url): string
    {

        $protocol = ['https://', 'http://'];

        return str_replace($protocol, '//', $url);

    }

    public function templateName($name): string
    {

        return $name;

    }

    /**
     * Обрезка строки под указанную длинну с учётом слов и подстановкой многоточния.
     *
     * @param string $string   входящая строка
     * @param float  $length   длинна строки
     * @param string $postfix  постфикс строки, по умолчанию -- многоточие
     * @param string $encoding Кодировка строки
     *
     * @return string
     */
    public function mbCutString(string $string, int $length, string $postfix = '…', string $encoding = 'UTF-8'): string
    {

        if (mb_strlen($string, $encoding) <= $length) {
            return $string;
        }

        $tmp = mb_substr($string, 0, $length, $encoding);

        return mb_substr($tmp, 0, mb_strripos($tmp, ' ', 0, $encoding), $encoding) . $postfix;

    }

}
