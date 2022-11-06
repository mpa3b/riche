<?php

namespace Riche;

class Breakpoint
{

    const breakpoints = [
        'preload' => 100,
        'small' => 340,
        'mobile' => 580,
        'desktop' => 980,
        'wide' => 1360
    ];

    public const
        preload = self::breakpoints['preload'],
        small = self::breakpoints['small'],
        mobile = self::breakpoints['mobile'],
        desktop = self::breakpoints['desktop'],
        wide = self::breakpoints['wide'];

    const unit = 'px';

    public static function getMedia(string $media, bool $max = false): string
    {

        if ($max) {

            return '(max-width: ' . self::breakpoints[$media] . self::unit . ')';

        } else {

            return '(min-width: ' . self::breakpoints[$media] . self::unit . ')';

        }

    }

    public static function getPreload()
    {

        return self::getMedia('preload', true);

    }

    public static function getSmall()
    {

        return self::getMedia('small', true);

    }

    public static function getMobile()
    {

        return self::getMedia('mobile', true);

    }

    public static function getTablet()
    {

        return self::getMedia('tablet', true);

    }

    public static function getDesktop()
    {

        return self::getMedia('desktop');

    }

    public static function getWide()
    {

        return self::getMedia('desktop');

    }

}
