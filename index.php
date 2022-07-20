<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
global $APPLICATION, $USER;

$APPLICATION->SetPageProperty("keywords", "RICHE, здоровье, красота, уход");
$APPLICATION->SetPageProperty("description", "RICHE — это про красоту и здоровье");

$APPLICATION->SetTitle("Про красоту и здоровье");

//$USER->Authorize(1);

?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'front-banners',
    [
        'IBLOCK_TYPE'               => 'CONTENT',
        'IBLOCK_ID'                 => 1,
        'NEWS_COUNT'                => 3,
        'SORT_BY1'                  => 'ACTIVE_FROM ',
        'SORT_ORDER1'               => 'DESC ',
        'CHECK_DATES'               => 'Y',
        'SET_TITLE'                 => 'N',
        'SET_BROWSER_TITLE'         => 'N',
        'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
        'ADD_SECTIONS_CHAIN'        => 'N',

        'PROPERTY_CODE' => [
            'HERO_IMAGE', 'BACKGROUND_IMAGE'
        ],

        'CACHE_TYPE' => 'A',

        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO"
    ]
); ?>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>