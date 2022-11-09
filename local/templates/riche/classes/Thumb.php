<?php

namespace Riche;

use Bitrix\Main\Config\Option;
use Bitrix\Main\Loader;
use CFile;

class Thumb
{

    /**
     * Строка встраиваемого замещающего изображения
     */
    const PLACEHOLDER = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
    /**
     * Глобальная константа качества сжатия JPEG от 0 до 100
     */
    private static         $JPEG_QUALITY;
    private static         $JPEG_QUALITY_PRELOAD;
    private static ?string $root;

    private function __construct()
    {

        self::$JPEG_QUALITY         = Option::get('main', 'image_resize_quality');
        self::$JPEG_QUALITY_PRELOAD = self::$JPEG_QUALITY / 2;

        self::$root = Loader::getDocumentRoot();

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
    ) : array {

        return [
            'width'  => intval($targetWidth * $scaleRatio),
            'height' => intval($targetWidth * $scaleRatio / $proportion)
        ];

    }

    public static function getWebP(&$file, $quality = false)
    {

        if (!$quality) {

            $quality = self::$JPEG_QUALITY;

        }

        if (is_int($file)) {

            $file = CFile::GetFileArray($file);

        }

        if (!empty($file['SRC'])) {

            $file['WEBP_SRC']          = self::convertToWebP($file['SRC'], $quality);
            $file['WEBP_CONTENT_TYPE'] = mime_content_type($file['WEBP_SRC']);

            if (!$file['CONTENT_TYPE']) {
                $file['CONTENT_TYPE'] = mime_content_type($file['SRC']);
            }

        }
        else {

            if (!empty($file['src'])) {

                $file['webp_src']          = self::convertToWebP($file['src'], $quality);
                $file['webp_content_type'] = mime_content_type($file['webp_src']);

                $file['content_type'] = mime_content_type($file['src']);

            }

        }

    }

    public static function convertToWebP(string $src, int $quality) : string
    {

        if (!$quality) {

            $quality = self::$JPEG_QUALITY;

        }

        if (is_array($src)) {

            if (!empty($src['SRC'])) {

                $src = $src['SRC'];

            }
            else {
                if (!empty($src['src'])) {

                    $src = $src['src'];

                }
            }

        }

        $path = null;

        if ($src && function_exists('imagewebp')) {

            $path = str_replace(['.jpg', '.jpeg', '.gif', '.png'], '.webp', $src);

            if (!file_exists(self::$root . $path)) {

                $info = getimagesize(self::$root . $src);

                if ($info !== false && ($type = $info[2])) {

                    switch ($type) {

                        case IMAGETYPE_JPEG:
                            $webP = imagecreatefromjpeg(self::$root . $src);
                            break;

                        case IMAGETYPE_GIF:
                            $webP = imagecreatefromgif(self::$root . $src);
                            break;

                        case IMAGETYPE_PNG:
                            $webP = imagecreatefrompng(self::$root . $src);
                            break;

                    }

                    if ($webP) {
                        imagewebp($webP, self::$root . $path, $quality);
                        imagedestroy($webP);
                    }

                }

            }

        }

        return $path;

    }

    public static function getImageSizes(string $breakpoint, int $quantity, float $ratio, float $scale = 1) : array
    {

        $width      = Breakpoint::getMedia($breakpoint);
        $imageWidth = $width / $quantity;

        $sizes = [
            'width'  => $imageWidth * $scale,
            'height' => $imageWidth * $ratio * $scale
        ];

        return $sizes;

    }

    private static function makeUri(string $path) : string
    {

        $file = self::$root . $path;

        $type   = mime_content_type($file);
        $base64 = base64_encode(file_get_contents($file));
        $uri    = 'data:' . $type . ';base64,' . $base64;

        return $uri;

    }

    private static function makeUriFromId(string $id) : string
    {

        $image = CFile::ResizeImageGet(
            $id,
            [
                'width'  => Breakpoint::breakpoints['preload'],
                'height' => Breakpoint::breakpoints['preload']
            ],
            BX_RESIZE_IMAGE_EXACT
        );

        $file = $image['SRC'];

        $type   = mime_content_type($file);
        $base64 = base64_encode(file_get_contents($file));
        $uri    = 'data:' . $type . ';base64,' . $base64;

        return $uri;

    }

}
