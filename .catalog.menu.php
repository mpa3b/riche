<?php

use Bex\Tools\Iblock\IblockTools;
use Bitrix\Iblock\SectionTable;
use Bitrix\Main\Loader;

Loader::includeModule('iblock');

$rSections = SectionTable::getList(
    [
        'filter' => [
            'IBLOCK_ID'     => IblockTools::find('CATALOG', 'PRODUCTS')->id(),
            'ACTIVE'        => 'Y',
            'GLOBAL_ACTIVE' => 'Y'
        ],
        'select' => [
            'ID',
            'NAME',
            'URL' => 'IBLOCK.SECTION_PAGE_URL'
        ],
        'cache'  => [
            'cache_ttl' => CACHE_TTL
        ]
    ]
);

$sections = $rSections->fetchAll();

if (!empty($sections)) {

    $aMenuLinks = [];

    foreach ($sections as $section) {

        $aMenuLinks[] = [
            [
                $section['NAME'],
                $section['URL'],
                [],
                [],
                ""
            ]
        ];

    }

}
