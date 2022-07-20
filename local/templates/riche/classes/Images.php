<?php

namespace Riche;

class Images
{

    /**
     * Глобальная константа качества сжатия JPEG от 0 до 100
     */

    public const JPEG_QUALITY         = 75;
    public const JPEG_QUALITY_PRELOAD = self::JPEG_QUALITY / 2;

    public static function getMedia($breakpoint, $max = false): string
    {

        if (in_array($breakpoint, array_keys(self::BREAKPOINTS))) {

            $string = 'all and (';

            if ($max) {
                $string .= 'max-width: ';
            } else {
                $string .= 'min-width: ';
            }

            $string .= self::BREAKPOINTS[$breakpoint] . 'px';
            $string .= ')';

            return $string;

        } else {

            return false;

        }

    }

    public const BREAKPOINTS = [
        "mobile"  => 375,
        "desktop" => 980,
        "wide"    => 1360,
    ];

    /**
     * Простая функция арифметического подсчёта размеров изображения с указанием пропорции
     * для обработки изображений при помощи CFile::ResizeImageGet
     *
     * Только _подсчёт_ размера!
     *
     * @param int   $targetWidth ширина
     * @param float $proportion  отношение ширины к высоте по умолчанию: 4/3
     * @param float $scaleRatio  масштаб увеличения
     *
     * @return array $arSizes массив размеров изображения для CFile::ResizeImageGet()
     **/

    public static function calculateImageSize(int   $targetWidth,
                                              float $proportion = 4 / 3,
                                              float $scaleRatio = 1): array
    {

        return [
            'width'  => intval($targetWidth * $scaleRatio),
            'height' => intval($targetWidth * $scaleRatio / $proportion)
        ];

    }

    public static function getWebP(&$file, $quality = Images::JPEG_QUALITY)
    {

        if (!empty($file['SRC'])) {

            $file['src']               = $file['SRC'];
            $file['webp_src']          = Images::conertToWebP($file['SRC'], $quality);
            $file['WEBP_SRC']          = Images::conertToWebP($file['SRC'], $quality);
            $file['WEBP_CONTENT_TYPE'] = Images::getMIME($file['WEBP_SRC']);
            $file['webp_content_type'] = Images::getMIME($file['WEBP_SRC']);

            if (!$file['CONTENT_TYPE']) {
                $file['CONTENT_TYPE'] = Images::getMIME($file['SRC']);
                $file['content_type'] = Images::getMIME($file['SRC']);
            }

        } else {

            if (!empty($file['src'])) {

                $file['webp_src']          = Images::conertToWebP($file['src'], $quality);
                $file['webp_content_type'] = Images::getMIME($file['webp_src']);

                $file['content_type'] = Images::getMIME($file['src']);

            }

        }

    }

    public static function conertToWebP($src, int $quality = Images::JPEG_QUALITY): string
    {

        if (is_array($src)) {

            if (!empty($src['SRC'])) {

                $src = $src['SRC'];

            } else {
                if (!empty($src['src'])) {

                    $src = $src['src'];

                }
            }

        }

        $path = null;

        if ($src && function_exists('imagewebp')) {

            $path = str_replace(['.jpg', '.jpeg', '.gif', '.png'], '.webp', $src);

            if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $path)) {

                $info = getimagesize($_SERVER['DOCUMENT_ROOT'] . $src);

                if ($info !== false && ($type = $info[2])) {

                    switch ($type) {

                        case IMAGETYPE_JPEG:
                            $webP = imagecreatefromjpeg($_SERVER['DOCUMENT_ROOT'] . $src);
                            break;

                        case IMAGETYPE_GIF:
                            $webP = imagecreatefromgif($_SERVER['DOCUMENT_ROOT'] . $src);
                            break;

                        case IMAGETYPE_PNG:
                            $webP = imagecreatefrompng($_SERVER['DOCUMENT_ROOT'] . $src);
                            break;

                    }

                    if ($webP) {
                        imagewebp($webP, $_SERVER['DOCUMENT_ROOT'] . $path, $quality);
                        imagedestroy($webP);
                    }

                }

            }

        }

        return $path;

    }

    public static function getMIME(string $url): string
    {

        return PreloadLinks::getMimeType($url);

    }

    private static function makeUri($path): string
    {

        $file = self::_root() . $path;

        return 'data:' . mime_content_type($file) . ';base64,' . base64_encode(file_get_contents($file));

    }

    /**
     * Обертка над глобальной переменной
     *
     * @return DOCUMENT_ROOT
     */
    private static function _root()
    {
        return $_SERVER['DOCUMENT_ROOT'];
    }

}
