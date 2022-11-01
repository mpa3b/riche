<?php

    namespace Riche;

    use Bitrix\Main\Config\Option;
    use Bitrix\Main\Loader;

    /**
     * @property string $JPEG_QUALITY
     */
    class WebP
    {

        private function __construct()
        {

            self::$JPEG_QUALITY = Option::get('main', 'image_resize_quality');
            self::$JPEG_QUALITY_PRELOAD = self::$JPEG_QUALITY / 2;

        }

        public static function getWebP(&$file, $quality = 75)
        {

            if (!empty($file['SRC'])) {

                $file['src']               = $file['SRC'];
                $file['webp_src']          = self::convertToWebP($file['SRC'], $quality);
                $file['WEBP_SRC']          = self::convertToWebP($file['SRC'], $quality);
                $file['webp_content_type'] = mime_content_type($file['WEBP_SRC']);
                $file['WEBP_CONTENT_TYPE'] = mime_content_type($file['WEBP_SRC']);

                if (!$file['CONTENT_TYPE']) {
                    $file['content_type'] = mime_content_type($file['SRC']);
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

        public static function convertToWebP($src, int $quality = self::JPEG_QUALITY) : string
        {

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

        private static function makeUri($path) : string
        {

            $file = Loader::getDocumentRoot() . $path;

            return 'data:' . mime_content_type($file) . ';base64,' . base64_encode(file_get_contents($file));

        }

    }
