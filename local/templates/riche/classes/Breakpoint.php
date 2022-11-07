<?php

namespace Riche;

class Breakpoint
{

    const breakpoints
        = [
            'small'   => 340,
            'mobile'  => 580,
            'tablet'  => 780,
            'desktop' => 980,
            'wide'    => 1360
        ];

    const unit = 'px';

    const preload
        = [
            'width'  => 100,
            'height' => 100,
        ];

    public static function getMedia(string $breakpoint): string
    {

        switch ($breakpoint) {

            case 'small' :

                $media = '(max-width: ' . self::breakpoints['small'] . self::unit . ')';

                break;

            case 'mobile' :

                $media = '(max-width: ' . self::breakpoints['mobile'] . self::unit . ')';

                break;

            case 'tablet' :

                $media = '(min-width: ' . self::breakpoints['mobile'] . self::unit . ')';

                break;

            case 'desktop' :

                $media = '(min-width: ' . self::breakpoints['tablet'] . self::unit . ')';

                break;

            case 'wide' :

                $media = '(min-width: ' . self::breakpoints['desktop'] . self::unit . ')';

                break;

        }

        return $media;

    }

}
