<?php
//
//if (!function_exists('getSectionList')) {
//
//    function getSectionList($filter,
//                            $select)
//    {
//
//        $dbSection = CIBlockSection::GetList(
//            [
//                'LEFT_MARGIN' => 'ASC',
//            ],
//            array_merge(
//                [
//                    'ACTIVE'        => 'Y',
//                    'GLOBAL_ACTIVE' => 'Y',
//                ],
//                is_array($filter) ? $filter : []
//            ),
//            false,
//            array_merge(
//                [
//                    'ID',
//                    'IBLOCK_SECTION_ID',
//                    'UF_MAIN_MENU',
//                ],
//                is_array($select) ? $select : []
//            )
//        );
//
//        while ($arSection = $dbSection->GetNext(true, false)) {
//
//            $SID  = $arSection['ID'];
//            $PSID = (int)$arSection['IBLOCK_SECTION_ID'];
//
//            $arLincs[$PSID]['CHILDS'][$SID] = $arSection;
//
//            $arLincs[$SID] = &$arLincs[$PSID]['CHILDS'][$SID];
//        }
//
//        return array_shift($arLincs);
//
//    }
//
//    $arSections = getSectionList(
//        [
//            'ACTIVE'    => 'Y',
//            'IBLOCK_ID' => 1,
//            '',
//        ],
//        [
//            'NAME',
//            'SECTION_PAGE_URL',
//        ]
//    );
//
//    foreach ($arSections['CHILDS'] as $child) {
//
//        $aMenuLinks[] = [
//            $child['NAME'],
//            $child['SECTION_PAGE_URL'],
//            [],
//            [
//                'ID' => $child['ID']
//            ],
//        ];
//    }
//
//}


$aMenuLinks[] = [
    'FAQ',
    '/help/',
    [],
    [
        'FROM_IBLOCK' => true,
        'IS_PARENT'   => false,
        'DEPTH_LEVEL' => 1,
    ],
];


$aMenuLinks[] = [
    'Отзывы',
    '/reviews/',
    [],
    [
        'FROM_IBLOCK' => true,
        'IS_PARENT'   => false,
        'DEPTH_LEVEL' => 1,
    ],
];


$aMenuLinks[] = [
    'О нас',
    '/promo/',
    [],
    [
        'FROM_IBLOCK' => true,
        'IS_PARENT'   => false,
        'DEPTH_LEVEL' => 1,
    ],
];

$aMenuLinks[] = [
    'Вакансии',
    '/hh/',
    [],
    [
        'FROM_IBLOCK' => true,
        'IS_PARENT'   => false,
        'DEPTH_LEVEL' => 1,
    ],
];
