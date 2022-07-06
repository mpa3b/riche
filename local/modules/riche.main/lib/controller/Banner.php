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

    public function getAction()
    {
        $request = $this->getRequest();

        Loader::includeModule('iblock');

        $elements = ElementBannerTable::getList([
            'select' => array_merge($request['select'], [
                'P_PICTURE_' => 'PREVIEW_PICTURE',
                'D_PICTURE_' => 'DETAIL_PICTURE',
            ]),
            'filter' => ['=ACTIVE' => 'Y'],
            'runtime' => [
                'PREVIEW_PICTURE' => [
                    'data_type' => FileTable::class,
                    'reference' => [
                        '=this.ID' => 'ref.ID'
                    ],
                    'join_type' => 'LEFT'
                ],
                'DETAIL_PICTURE' => [
                    'data_type' => FileTable::class,
                    'reference' => [
                        '=this.ID' => 'ref.ID'
                    ],
                    'join_type' => 'LEFT'
                ]
            ],
            'cache' => [
                "ttl" => 3600,
                'cache_joins' => true
            ]
        ])->fetchAll();


        return ['response' => 'success', 'data' => $elements];
    }
}