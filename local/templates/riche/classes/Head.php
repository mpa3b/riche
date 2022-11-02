<?php

namespace Riche;

use Bitrix\Main\Page\Asset;

/**
 * Класс для формирования ссылок на предзагрузку
 */
class Head
{

    /**
     * Определение типа содержимого для подстановки в *link as*
     *
     * @param $url
     *
     * @return false|string
     */
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
     * Функция добавления внешнего ресурса в предзагрузку как *link preload*
     *
     * @param $url
     */
    public static function addHeadPreloadAsset(string $url): void
    {

        $type = self::getAssetType($url);

        Asset::getInstance()->addString('<link rel="preload" href="' . $url . '" as="' . $type . '" >');

    }

    /**
     * Функция добавления внешнего ресурса в постзагрузку как *link prefetch*
     *
     * @param $url
     */
    public static function addHeadPrefetchAsset(string $url): void
    {

        $type = self::getAssetType($url);

        Asset::getInstance()->addString('<link rel="prefetch" href="' . $url . '" as="' . $type . '">');


    }

    /**
     * Функция установки указателя на предподключение *link preconnect*
     *
     * @param $url
     *
     * @return void
     */
    public static function preconnectDomain($url): void
    {

        $domain = parse_url($url, PHP_URL_SCHEME) . '//' . parse_url($url, PHP_URL_HOST);

        Asset::getInstance()->addString('<link rel="preconnect" href="' . $domain . '">');

    }

    /**
     * Функция установки указателя на предподключение *link preconnect*
     *
     * @param $url
     *
     * @return void
     */
    public static function addPrerenderLink($url): void
    {

        Asset::getInstance()->addString('<link rel="prerender" href="' . $url . '">');

    }

}
