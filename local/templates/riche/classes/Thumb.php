<?php

namespace Riche;

use Bitrix\Main\Config\Option;
use Bitrix\Main\Data\Cache;
use Bitrix\Main\Loader;

class Thumb
{

    private function __construct()
    {

        self::$JPEG_QUALITY = Option::get('main', 'image_resize_quality');
        self::$JPEG_QUALITY_PRELOAD = self::$JPEG_QUALITY / 2;

    }

    /**
     * Глобальная константа качества сжатия JPEG от 0 до 100
     */
    static $JPEG_QUALITY;
    static $JPEG_QUALITY_PRELOAD;

    /**
     * Строка встраиваемого замещающего изображения
     */
    const PLACEHOLDER = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';

    private static function makeUri(string $path): string
    {

        $file = Loader::getDocumentRoot() . $path;

        $type = mime_content_type($file);
        $base64 = base64_encode(file_get_contents($file));
        $uri = 'data:' . $type . ';base64,' . $base64;

        return $uri;

    }

    /**
     * Простая функция арифметического подсчёта размеров изображения с указанием пропорции
     * для обработки изображений при помощи CFile::ResizeImageGet
     * Только _подсчёт_ размера!
     *
     * @param int   $targetWidth ширина
     * @param float $proportion  отношение ширины к высоте по умолчанию: 4/3
     * @param float $scaleRatio  масштаб увеличения
     *
     * @return array $arSizes массив размеров изображения для CFile::ResizeImageGet()
     **/

    public static function calculateImageSize(
        int   $targetWidth,
        float $proportion = 4 / 3,
        float $scaleRatio = 1
    ): array {

        return [
            'width'  => intval($targetWidth * $scaleRatio),
            'height' => intval($targetWidth * $scaleRatio / $proportion)
        ];

    }

}
