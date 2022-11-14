<?php

namespace Riche;

use Bitrix\Main\Page\Asset;


/**
 * Класс для подклчения Vue к Битрикс.
 * Требует отладки и доработки.
 */
class Vue
{

    const COMPONENTS_PATH = '../components/vue';
    private static       $arIncluded;
    private static array $arHtml;

    /**
     * Путь к директории с компонентами
     *
     * @return string
     */
    public static function getComponentsPath() : string
    {

        return self::COMPONENTS_PATH;
    }

    /**
     * Инициализирует глобальные настройки, доступные в компонентах this.$bx
     *
     * @return string
     */
    public static function getGlobalJsConfig() : string
    {
        $script = '<script>';
        $script .= 'Vue.prototype.$bx=';
        $script .= json_encode([
                                   'componentsPath'   => self::getComponentsPath(),
                                   'siteTemplatePath' => SITE_TEMPLATE_PATH
                               ]);
        $script .= '</script>';

        return $script;
    }

    /**
     * Вставляет все подключенные компоненты в тело документа
     * Метод обработчик события OnEndBufferContent
     *
     * @param $content
     */
    public static function insertComponents(&$content)
    {

        $include = "<div hidden>";
        $include .= implode("\n", self::$arHtml);
        $include .= self::getGlobalJsConfig();
        $include .= "</div>";

        $content = preg_replace('/<body([^>]*)?>/', "<body$1>" . $include, $content, 1);

    }

    /**
     * Подключает js или css файл
     *
     * @param string $file
     */
    public static function addFile(string $file)
    {

        if (strpos($file, '.js') !== false) {
            Asset::getInstance()->addJs($file);
        }
        if (strpos($file, '.css') !== false) {
            Asset::getInstance()->addCss($file);
        }

    }

    /**
     * Подключает Vue-компонент
     *
     * @param string|array $componentName
     * @param array        $addFiles
     *
     * @throws Exception
     */
    public static function includeComponent($componentName, array $addFiles = [])
    {

        // Подключаем Vue.js и Vuex

        Asset::getInstance()->addJs('https://unpkg.com/vue');
        Asset::getInstance()->addJs('https://unpkg.com/vuex');

        foreach ((array) $componentName as $name) {

            if (self::$arIncluded[$name] === true) {
                continue;
            }

            self::$arIncluded[$name] = true;

            $docPath  = self::getComponentsPath();
            $rootPath = $_SERVER['DOCUMENT_ROOT'] . $docPath;

            // Подключает зависимости скрипты/стили
            if (file_exists($settings = $rootPath . '/' . $name . '/.settings.php')) {

                $settings = require_once $settings;

                if (array_key_exists('require', $settings)) {

                    foreach ((array) $settings['require'] as $file) {

                        self::addFile($file);

                    }

                }

            }

            // Подключает доп. зависимости скрипты/стили
            foreach ($addFiles as $file) {
                self::addFile($file);
            }

            if (file_exists($template = $rootPath . '/' . $name . '/template.vue')) {
                self::$arHtml[] = file_get_contents($template);
            }

            if (file_exists($rootPath . '/' . $name . '/script.js')) {
                self::addFile($docPath . '/' . $name . '/script.js');
            }
            elseif (file_exists($rootPath . '/' . $name . '/script.min.js')) {
                self::addFile($docPath . '/' . $name . '/script.min.js');
            }

            if (file_exists($rootPath . '/' . $name . '/style.css')) {
                self::addFile($docPath . '/' . $name . '/style.css');
            }
            elseif (file_exists($rootPath . '/' . $name . '/style.min.css')) {
                self::addFile($docPath . '/' . $name . '/style.min.css');
            }

        }

    }

}
