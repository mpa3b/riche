<?php

    namespace Riche;

    class Breakpoint
    {

        const breakpoints
                      = [
                'mobile'  => 580,
                'desktop' => 980,
                'wide'    => 1360
            ];

        public const
              mobile  = self::breakpoints['mobile'],
              desktop = self::breakpoints['desktop'],
              wide    = self::breakpoints['wide'];

        const unit    = 'px';

        public static function getMedia(string $media, bool $max = false) : string
        {

            if ($max) {

                return '(max-width: ' . self::breakpoints[$media] . self::unit . ')';

            }
            else {

                return '(min-width: ' . self::breakpoints[$media] . self::unit . ')';

            }

        }

        public static function getTablet()
        {

            self::getMedia('mobile', true);

        }

        public static function getDesktop()
        {

            self::getMedia('desktop');

        }

        public static function getWide()
        {

            self::getMedia('desktop');

        }

    }
