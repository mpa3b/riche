<?php

use Bitrix\Main\Loader;
use Riche\Main\Controller\Banner;

class BannerComponent extends CBitrixComponent
{
    public function __construct(CBitrixComponent $component = null)
    {
        parent::__construct($component);
    }

    protected function getBanners(){
        Loader::includeModule('riche.main');
        $banner = new Banner();
        return $banner->getBanners($this->arParams['FIELDS']);
    }

    public function executeComponent(){

        $this->arResult['SECTION_ID'] = strtolower("RCH_".$this->arParams['BLOCK_ID']);
        $this->arResult['TEMPLATE_ID'] = strtolower("RCH_".$this->arParams['BLOCK_ID']."_template");
        $this->arResult['RESULT'] = json_encode($this->getBanners());
        $this->includeComponentTemplate();
    }
}