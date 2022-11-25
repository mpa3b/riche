<?php

namespace Local;

/**
 * Очистка буфера
 */
class Buffer
{

    /**
     * Общая функция обработки
     *
     * @param $content
     *
     * @return void
     */
    public static function clean(&$content)
    {

        self::removeClutter($content);

        self::packHTML($content);

    }

    /**
     * Удаляет ненужные атрибуты в HTML
     *
     * @param $content
     *
     * @return void
     */
    private static function removeClutter(&$content)
    {

        $content = str_replace(
            [
                "=\"\"",
                "/s/s",
                "=\"\"",
                " type=\"text/javascript\"",
                "</script></script>"
            ],
            [
                false,
                false,
                false,
                false,
                "</script>"
            ],
            $content
        );

    }

    /**
     * Очистка HTML
     *
     * @param $buffer
     *
     * @return void
     */
    private static function packHTML(&$buffer)
    {
        $search = [
            '/\>[^\S]+/s',     // strip whitespaces after tags, except space
            '/[^\S]+\</s',     // strip whitespaces before tags, except space
            '/(\s)+/s',         // shorten multiple whitespace sequences
            '/<!--(.|\s)*?-->/' // Remove HTML comments
        ];

        $replace = [
            '>',
            '<',
            '\\1',
            ''
        ];

        $blocks = preg_split('/(<\/?pre[^>]*>)/', $buffer, null, PREG_SPLIT_DELIM_CAPTURE);

        $buffer = '';

        foreach ($blocks as $i => $block) {
            if ($i % 4 == 2) {
                $buffer .= $block;
            }
            else {
                $buffer .= preg_replace($search, $replace, $block);
            }
        }

    }

}
