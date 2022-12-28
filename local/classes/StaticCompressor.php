<?php

    namespace Local;

    use Bitrix\Main\Application;

    /**
     * @todo  нужно учесть, что не все файлы будут при обновлении будут перезаписываться неоптимизированными версиями
     *
     * - например, стили CSS и скрипты JS будут или заменяться оптимизированными версиями, или сопровождаться
     * - у растра jpg и png такого варианта нет -- картинки будут переупаковываться каждый раз
     * - та же история и с вектором SVG
     * - конвертировать в webP просто так будет бесполезно
     *
     * Сначала создадим итератор для файловой системы
     * который будет обрабатывать все файлы и папки, начиная с корня.
     * У него должны быть настройки игнорирования
     *
     * @link  https://www.php.net/manual/ru/class.directoryiterator.php
     */
    class StaticCompressor
    {

        /**
         * список папок, которые исключаются из проверки
         */
        private const excludedDirectory = [
            './bitrix',
            './local/classes',
            './local/components',
            './local/modules',
            './local/vendor',
            './upload'
        ];

        /**
         * папка обработанных изображений
         */
        private const resizeCacheDirectory = [
            './upload/resize_image_cache/'
        ];

        /**
         * папка собранного кеша ресурсов БУС
         */
        const bitrixCachedAssetsDirectory = [
            './bitrix/cache/js/',
            './bitrix/cache/css/'
        ];

        /**
         * обработка папки кеша ресурсов БУС
         *
         * @return void
         */
        public static function compressBitrixCachedAssets()
        {

            // тут мы запустим сжатие только папки кеша статики БУС

        }

        /**
         * обработка всей статики всего сайта за исключением исключённых
         *
         * @return void
         */
        public static function processStaticAssets()
        {

            // тут мы запустим рекурсивную обработку файлов и папок согласно установленных правил обработки

        }

        /**
         * обработчик файлов, определяет тип, вызывает соответствующий метод
         *
         * @return void
         */
        private static function fileProcessor()
        {

            switch (pathinfo(self::$currentFile, PATHINFO_EXTENSION)) {

                case 'css':

                    self::processCSS();

                    break;

                case 'js':

                    self::processJS();

                    break;

                case 'png':

                    self::processPNG();

                    break;

                case 'jpg':

                    self::processJPG();

                    break;

                case 'webp':

                    self::processWebP();

                    break;

                case 'svg':

                    self::processSVG();

                    break;

                default:

                    // just skip

                    break;
            }
        }

        /**
         * обработка CSS
         *
         * @return void
         */
        private static function processCSS()
        {
        }

        /**
         * обработка JS
         *
         * @return void
         */
        private static function processJS()
        {

        }

        /**
         * обработка JPG
         *
         * @return void
         */
        private static function processJPG()
        {

        }

        /**
         * обработка SVG
         *
         * @return void
         */
        private static function processSVG()
        {

        }

        /**
         * обработка WebP
         *
         * @return void
         */
        private static function processWebP()
        {

        }

        /**
         * обработка PNG
         *
         * @return void
         */
        private static function processPNG()
        {

        }

        /**
         * Общий запуск
         * @return void
         */
        private function __init()
        {

            // тут мы объявим обработчик файловой системы

            self::$root = Application::getDocumentRoot();


        }

    }
