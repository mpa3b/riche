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
    class PostInstallStaticProcessor
    {
        
        private const excludedDirectories = [
            './bitrix',
            './local/classes',
            './local/components',
            './local/modules',
            './local/vendor',
            './upload'
        ];
        
        private const includedDirectories = [
            './upload/resize_image_cache/',
            './bitrix/cache/css/',
            './bitrix/cache/js`/'
        ];
        
        public static function processStaticFiles()
        {
            
            // тут мы запустим рекурсивную обработку файлов и папок согласно установленных правил обработки
            
        }
        
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
        
        private function __init()
        {
            
            // тут мы объявим обработчик файловой системы
            
            self::$root = Application::getDocumentRoot();
            
            
        }
        
    }
