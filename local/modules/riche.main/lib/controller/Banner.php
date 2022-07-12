<?php

namespace Riche\Main\Controller;

use Bitrix\Iblock\Elements\ElementBannerTable;
use Bitrix\Main\Engine\Controller;
use Bitrix\Main\FileTable;
use Bitrix\Main\Loader;

class Banner extends Controller
{
    public function configureActions(): array
    {
        return [
            'get' => [
                'prefilters' => [] // метод sendAction() будет работать без фильтров
            ]
        ];
    }

    public function getBanners($select)
    {

        Loader::includeModule('iblock');

        $elements = ElementBannerTable::getList(
            [
                'select'  => array_merge(
                    $select,
                    [
                        'P_PICTURE_' => 'PREVIEW_PICTURE',
                        'D_PICTURE_' => 'DETAIL_PICTURE',
                    ]
                ),
                'filter'  => ['=ACTIVE' => 'Y'],
                'runtime' => [
                    'PREVIEW_PICTURE' => [
                        'data_type' => FileTable::class,
                        'reference' => [
                            '=this.ID' => 'ref.ID'
                        ],
                        'join_type' => 'LEFT'
                    ],
                    'DETAIL_PICTURE'  => [
                        'data_type' => FileTable::class,
                        'reference' => [
                            '=this.ID' => 'ref.ID'
                        ],
                        'join_type' => 'LEFT'
                    ]
                ],
                'cache'   => [
                    "ttl"         => 3600,
                    'cache_joins' => true
                ]
            ])->fetchAll();

        foreach ($elements as &$banner) {
            $banner['PREVIEW_PICTURE'] = 'upload/' . $banner['P_PICTURE_SUBDIR'] . '/' . $banner['P_PICTURE_FILE_NAME'];
            $banner['DETAIL_PICTURE']  = 'upload/' . $banner['D_PICTURE_SUBDIR'] . '/' . $banner['D_PICTURE_FILE_NAME'];
        }

        return $elements;

    }

    public function getAction()
    {
        $request = json_decode(file_get_contents('php://input'), true);

        Loader::includeModule('iblock');

        $elements = $this->getBanners($request['select']);

        return ['response' => 'success', 'data' => $elements];
    }

}