<?php

namespace Riche;

use Bitrix\Main\Page\Asset;

class PreloadLinks
{

    private const MIME_TYPES = [

        'txt'  => 'text/plain',
        'htm'  => 'text/html',
        'html' => 'text/html',
        'php'  => 'text/html',
        'css'  => 'text/css',
        'js'   => 'application/javascript',
        'json' => 'application/json',
        'xml'  => 'application/xml',
        'swf'  => 'application/x-shockwave-flash',
        'flv'  => 'video/x-flv',

        // images
        'png'  => 'image/png',
        'jpe'  => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'jpg'  => 'image/jpeg',
        'gif'  => 'image/gif',
        'bmp'  => 'image/bmp',
        'ico'  => 'image/vnd.microsoft.icon',
        'tiff' => 'image/tiff',
        'tif'  => 'image/tiff',
        'webp' => 'image/webp',

        //vector
        'svg'  => 'image/svg+xml',
        'svgz' => 'image/svg+xml',

        // archives
        'zip'  => 'application/zip',
        'rar'  => 'application/x-rar-compressed',
        'exe'  => 'application/x-msdownload',
        'msi'  => 'application/x-msdownload',
        'cab'  => 'application/vnd.ms-cab-compressed',

        // audio/video
        'mp3'  => 'audio/mpeg',
        'qt'   => 'video/quicktime',
        'mov'  => 'video/quicktime',
        'mp4'  => 'video/mp4',
        'ovg'  => 'video/ogg',
        'webm' => 'video/webm',

        // adobe
        'pdf'  => 'application/pdf',
        'psd'  => 'image/vnd.adobe.photoshop',
        'ai'   => 'application/postscript',
        'eps'  => 'application/postscript',
        'ps'   => 'application/postscript',

        // ms office
        'doc'  => 'application/msword',
        'rtf'  => 'application/rtf',
        'xls'  => 'application/vnd.ms-excel',
        'ppt'  => 'application/vnd.ms-powerpoint',

        // open office
        'odt'  => 'application/vnd.oasis.opendocument.text',
        'ods'  => 'application/vnd.oasis.opendocument.spreadsheet',

    ];

    /**
     * Функция добавления внешнего ресурса в предзагрузку
     *
     * @param $url
     */
    public static function addHeadPreloadAsset(string $url): void
    {

        $type = self::getAssetType($url);

        Asset::getInstance()->addString('<link rel="preload" as="' . $type . '" href="' . $url . '">');

    }

    private static function getAssetType($url)
    {

        $link = pathinfo($url);

        $type = false;

        switch ($link['extension']) {
            case 'js' :
                $type = 'script';
                break;
            case 'css' :
                $type = 'style';
                break;
            case 'ico' :
            case 'png' :
            case 'jpeg' :
            case 'jpg' :
            case 'svg' :
                $type = 'image';
                break;
            case 'eot' :
            case 'ttf' :
            case 'otf' :
            case 'woff' :
            case 'woff2' :
                $type = 'font';
                break;
        }

        return $type;

    }

    /**
     * Функция добавления внешнего ресурса в постзагрузку
     *
     * @param $url
     */
    public static function addHeadPrefetchAsset(string $url): void
    {

        $type = self::getAssetType($url);

        Asset::getInstance()->addString('<link rel="prefetch" as="' . $type . '" href="' . $url . '">');

    }

    public static function getMimeType($filepath): string
    {

        $mime_types = self::MIME_TYPES;

        $ext = strtolower(pathinfo($filepath, PATHINFO_EXTENSION));

        if (array_key_exists($ext, $mime_types)) {

            return $mime_types[$ext];

        } else {
            if (function_exists('finfo_open')) {

                $finfo    = finfo_open(FILEINFO_MIME);
                $mimetype = finfo_file($finfo, $filepath);

                finfo_close($finfo);

                return $mimetype;

            } else {

                return 'application/octet-stream';

            }
        }

    }

    public static function preconnectDomain($url): void
    {

        $domain = parse_url($url, PHP_URL_SCHEME) . '//' . parse_url($url, PHP_URL_HOST);

        Asset::getInstance()->addString('<link rel="preconnect" href="' . $domain . '">');

    }

    public static function preloadIcon($name): void
    {

        self::addHeadPreloadAsset(SITE_TEMPLATE_PATH . '/icons/' . $name . '.svg');

        // todo: вынести в класс с проверкой файла на существования и кешированием списка

    }

}
