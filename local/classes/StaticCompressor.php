<?php

    namespace Local;

    use Bitrix\Main\Application;
    use enshrined\svgSanitize\Sanitizer;
    use ImageOptimizer\OptimizerFactory;
    use YUI\Compressor;

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
         * Текущий обрабатываемый файл
         *
         * @var
         */
        private static $currentFile;

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

            $yui = new Compressor();

            $css = file_get_contents('styles.css');

            $yui->setType(Compressor::TYPE_CSS);

            $optimizedCss = $yui->compress($css);

            file_put_contents(self::$currentFile, $optimizedCss);

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

            $factory   = new OptimizerFactory();
            $optimizer = $factory->get();

            $optimizer->optimize(self::$currentFile);


        }

        /**
         * обработка PNG
         *
         * @return void
         */
        private static function processPNG()
        {

            $factory   = new OptimizerFactory();
            $optimizer = $factory->get();

            $optimizer->optimize(self::$currentFile);

        }

        /**
         * обработка SVG
         *
         * @return void
         */
        private static function processSVG()
        {

            $sanitizer = new Sanitizer();
            $svg       = file_get_contents(self::$currentFile);

            file_put_contents(self::$currentFile, $sanitizer->sanitize($svg));

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
         * Общий запуск
         *
         * @return void
         */
        private function __init()
        {

            // тут мы объявим обработчик файловой системы

            self::$root = Application::getDocumentRoot();


        }

        private static function saveFile()
        {

        }

    }
