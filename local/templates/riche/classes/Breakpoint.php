<?php

namespace Riche;

class Breakpoint
{

    const breakpoints
        = [
            'preload' => 100,
            'small'   => 340,
            'mobile'  => 580,
            'tablet'  => 780,
            'desktop' => 1080,
            'wide'    => 1460
        ];

    const unit = 'px';

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
