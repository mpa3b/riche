<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . "/local/vendor/autoload.php";

    use Bitrix\Main\Config\Option;
    use Bitrix\Main\EventManager;
    use Local\StaticCompressor;

    // region константа DEBUG

    if (Option::get('main', 'update_devsrv') == 'Y') {
        define('DEBUG', true);
    }

    // endregion

    // region остальные константы

    const CACHE_TTL     = 60 * 60 * 24 * 3;
    const SHOP_ROOT_URL = '/shop';
    const ORDER_URL     = '/order';
    const LOCAL_ASSETS  = '/local/assets';

    // endregion

    $eventManager = EventManager::getInstance();

    //region специфическое свойство -- **пропорция**

    $eventManager->addEventHandler(
        "iblock",
        "OnIBlockPropertyBuildList",
        [Local\IngredientProportionProperty::class, 'GetUserTypeDescription']
    );

    //endregion

    //region агент сжатия статических ресурсов

    /**
     * агенты сжатия для всех ресурсов и для папки кеша
     * @link https://dev.1c-bitrix.ru/learning/course/index.php?COURSE_ID=43&LESSON_ID=2290
     */
    function compressStaticAsset()
    {

        StaticCompressor::processStaticAssets();

        return "compressStaticAsset();";

    }

    function compressBitrixAssetCaches()
    {

        StaticCompressor::compressBitrixCachedAssets();

        return "compressBitrixAssetCaches();";

    }

    //endregion
