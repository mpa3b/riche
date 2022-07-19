<?php

namespace Local;

use CPHPCache;

/**
 *
 * Класс для очистки буфера и разные другие твики-хаки-костыли для этого под БУС.
 *
 * Проверять, перепроверять, а лучше лишний раз не использовать.
 *
 */
class Buffer
{

    public static function clean(&$content)
    {

        self::removeAttributes($content);
        self::removeDoubleClosingScript($content);

        self::setGlobalHeaders();
        self::packHTML($content);

        //self ::wipeKernelCssLinks($content);

        //self ::wipeKernelJsLinks($content);

        //self::includeCssInline($content);


    }

    private static function setGlobalHeaders()
    {

        header('X-UA-Compatible: IE=edge');
        header('refresh: 36000');
        header('X-DNS-Prefetch-Control: on');
        header('Content-Type: text/html; charset=' . strtolower(SITE_CHARSET));

    }

    /**
     * Удаляет ненужные атрибуты в HTML
     *
     * @param $content
     *
     * @return void
     */
    private static function removeAttributes(&$content)
    {

        $content = str_replace(
            "type=\"text/javascript\"",
            "",
            $content
        );

    }

    private static function removeDoubleClosingScript(&$content)
    {

        $content = str_replace(
            "</script></script>",
            "</script>",
            $content
        );

    }

    private function packHTML($buffer)
    {
        $search = [
            '/\>[^\S ]+/s', //strip whitespaces after tags, except space
            '/[^\S ]+\</s', //strip whitespaces before tags, except space
            '/(\s)+/s'      // shorten multiple whitespace sequences
        ];

        $replace = [
            '>',
            '<',
            '\\1'
        ];

        $blocks = preg_split('/(<\/?pre[^>]*>)/', $buffer, null, PREG_SPLIT_DELIM_CAPTURE);

        $buffer = '';

        foreach ($blocks as $i => $block) {
            if ($i % 4 == 2) {
                $buffer .= $block;
            } else {
                $buffer .= preg_replace($search, $replace, $block);
            }
        }

        return $buffer;

    }

//    private function wipeKernelJsLinks(&$content)
//    {
//        global $USER, $APPLICATION;
//
//        if ((is_object($USER) && $USER->IsAuthorized()) ||
//            strpos($APPLICATION->GetCurDir(), "/bitrix/") !== false) {
//            return;
//        }
//
//        if (is_object($APPLICATION) && $APPLICATION->GetProperty("save_kernel") == "Y") {
//            return;
//        }
//
//        $arPatternsToRemove = [
//            '/<script.+?src=".+?kernel_main\/kernel_main\.js\?\d+"><\/script\>/',
//            '/<script.+?src=".+?bitrix\/js\/main\/core\/core[^"]+"><\/script\>/',
    /*            '/<script.+?>BX\.(setCSSList|setJSList)\(\[.+?\]\).*?<\/script>/',*/
    /*            '/<script.+?>if\(\!window\.BX\)window\.BX.+?<\/script>/',*/
    /*            '/<script[^>]+?>\(window\.BX\|\|top\.BX\)\.message[^<]+<\/script>/',*/
//        ];
//
//        $content = preg_replace($arPatternsToRemove, "", $content);
//        $content = preg_replace("/\n{2,}/", "\n\n", $content);
//    }

//    private function wipeKernelCssLinks(&$content)
//    {
//        global $USER, $APPLICATION;
//
//        if ((is_object($USER) && $USER->IsAuthorized()) ||
//            strpos($APPLICATION->GetCurDir(), "/bitrix/") !== false) {
//            return;
//        }
//        if ($APPLICATION->GetProperty("save_kernel") == "Y") {
//            return;
//        }
//
//        $arPatternsToRemove = [
//            '/<link.+?href=".+?kernel_main\/kernel_main\.css\?\d+"[^>]+>/',
//            '/<link.+?href=".+?bitrix\/js\/main\/core\/css\/core[^"]+"[^>]+>/',
//            '/<link.+?href=".+?bitrix\/templates\/[\w\d_-]+\/styles.css[^"]+"[^>]+>/',
//            '/<link.+?href=".+?bitrix\/templates\/[\w\d_-]+\/template_styles.css[^"]+"[^>]+>/',
//        ];
//
//        $content = preg_replace($arPatternsToRemove, "", $content);
//        $content = preg_replace("/\n{2,}/", "\n\n", $content);
//    }

    private function includeCssInline(&$content, $ttl = 1800)
    {

        global $USER, $APPLICATION;

        if ((is_object($USER) && $USER->IsAuthorized()) ||
            strpos($APPLICATION->GetCurDir(), "/bitrix/") !== false) {
            return;
        }
        if ($APPLICATION->GetProperty("save_kernel") == "Y") {
            return;
        }

        preg_match('/<link.+?href="(\/bitrix\/cache\/css\/' . SITE_ID . '\/' . SITE_TEMPLATE_ID .
                   '\/template_[^"]+)"[^>]+>/', $content, $arMatches);

        $sFilePath = "https://" . $_SERVER["HTTP_HOST"] . $arMatches[1];

        $obCache = new CPHPCache;

        if ($obCache->InitCache($ttl, $sFilePath, "/")) {
            $vars             = $obCache->GetVars();
            $sIncludeCss      = $vars["sIncludeCss"];
            $sIncludeCssClear = $vars["sIncludeCssClear"];
        } else {
            $sIncludeCss      = file_get_contents($sFilePath);
            $sIncludeCssClear = self::cssMin($sIncludeCss);
        }

        $content = str_replace($arMatches[0], "<style>$sIncludeCssClear</style>", $content);

        if ($obCache->StartDataCache()) {
            $obCache->EndDataCache(
                [
                    "sIncludeCss"      => $sIncludeCss,
                    "sIncludeCssClear" => $sIncludeCssClear,
                ]
            );
        }

    }

    private function compressCSS($css, $arOptions = [])
    {

        $sResult = $css;

        $sResult = preg_replace("/\/\*[^*]+\*\//", "", $sResult);               // comments
        $sResult = preg_replace("/\/\**\*\//", "", $sResult);                   // comments
        $sResult = preg_replace("/\s*(:|,|;|{|}|\t)\s*/", "$1", $sResult);      // whitespaces
        $sResult = preg_replace("/(\t+|\s{2,})/", " ", $sResult);               // tabs and double whitespace
        $sResult = preg_replace("/(\s|:)([\-]{0,1}0px)\s/", " 0 ", $sResult);   // zeros
        $sResult = preg_replace("/#(\w){6};/", "#$1$1$1;", $sResult);           // #dddddd => #ddd

        return $sResult;

    }

    private function compressJS($buffer)
    {

        // JavaScript compressor by John Elliot <jj5@jj5.net>

        $replace = [
            '#\'([^\n\']*?)/\*([^\n\']*)\'#' => "'\1/'+\'\'+'*\2'", // remove comments from ' strings
            '#\"([^\n\"]*?)/\*([^\n\"]*)\"#' => '"\1/"+\'\'+"*\2"', // remove comments from " strings
            '#/\*.*?\*/#s'                   => "",      // strip C style comments
            '#[\r\n]+#'                      => "\n",    // remove blank lines and \r's
            '#\n([ \t]*//.*?\n)*#s'          => "\n",    // strip line comments (whole line only)
            '#([^\\])//([^\'"\n]*)\n#s'      => "\\1\n", // strip line comments
            // (that aren't possibly in strings or regex's)
            '#\n\s+#'                        => "\n",    // strip excess whitespace
            '#\s+\n#'                        => "\n",    // strip excess whitespace
            '#(//[^\n]*\n)#s'                => "\\1\n", // extra line feed after any comments left
            // (important given later replacements)
            '#/([\'"])\+\'\'\+([\'"])\*#'    => "/*" // restore comments in strings
        ];

        $search = array_keys($replace);
        $script = preg_replace($search, $replace, $buffer);

        $replace = [
            "&&\n" => "&&",
            "||\n" => "||",
            "(\n"  => "(",
            ")\n"  => ")",
            "[\n"  => "[",
            "]\n"  => "]",
            "+\n"  => "+",
            ",\n"  => ",",
            "?\n"  => "?",
            ":\n"  => ":",
            ";\n"  => ";",
            "{\n"  => "{",
            //  "}\n"  => "}", (because I forget to put semicolons after function assignments)
            "\n]"  => "]",
            "\n)"  => ")",
            "\n}"  => "}",
            "\n\n" => "\n"
        ];

        $search = array_keys($replace);
        $script = str_replace($search, $replace, $script);

        return trim($script);

    }

    /**
     * Minification CSS Code
     *
     * @param $css
     *
     * @return mixed|string|string[]|null
     */
    private function cssMin($css)
    {
        // some of the following functions to minimize the css-output are directly taken
        // from the awesome CSS JS Booster: https://github.com/Schepp/CSS-JS-Booster
        // all credits to Christian Schaefer: http://twitter.com/derSchepp
        // remove comments
        $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
        // backup values within single or double quotes
        preg_match_all('/(\'[^\']*?\'|"[^"]*?")/ims', $css, $hit, PREG_PATTERN_ORDER);
        for ($i = 0; $i < count($hit[1]); $i++) {
            $css = str_replace($hit[1][$i], '##########' . $i . '##########', $css);
        }
        // remove traling semicolon of selector's last property
        $css = preg_replace('/;[\s\r\n\t]*?}[\s\r\n\t]*/ims', "}\r\n", $css);
        // remove any whitespace between semicolon and property-name
        $css = preg_replace('/;[\s\r\n\t]*?([\r\n]?[^\s\r\n\t])/ims', ';$1', $css);
        // remove any whitespace surrounding property-colon
        $css = preg_replace('/[\s\r\n\t]*:[\s\r\n\t]*?([^\s\r\n\t])/ims', ':$1', $css);
        // remove any whitespace surrounding selector-comma
        $css = preg_replace('/[\s\r\n\t]*,[\s\r\n\t]*?([^\s\r\n\t])/ims', ',$1', $css);
        // remove any whitespace surrounding opening parenthesis
        $css = preg_replace('/[\s\r\n\t]*{[\s\r\n\t]*?([^\s\r\n\t])/ims', '{$1', $css);
        // remove any whitespace between numbers and units
        $css = preg_replace('/([\d\.]+)[\s\r\n\t]+(px|em|pt|%)/ims', '$1$2', $css);
        // shorten zero-values
        $css = preg_replace('/([^\d\.]0)(px|em|pt|%)/ims', '$1', $css);
        // constrain multiple whitespaces
        $css = preg_replace('/\p{Zs}+/ims', ' ', $css);
        // remove newlines
        $css = str_replace(["\r\n", "\r", "\n"], '', $css);
        // Restore backupped values within single or double quotes
        for ($i = 0; $i < count($hit[1]); $i++) {
            $css = str_replace('##########' . $i . '##########', $hit[1][$i], $css);
        }
        return $css;
    }

}
