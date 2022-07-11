<?php

class BannerComponent extends CBitrixComponent
{
    public function executeComponent(){
        $this->arResult['SECTION_ID'] = strtolower("RCH_".$this->arParams['BLOCK_ID']);
        $this->arResult['TEMPLATE_ID'] = strtolower("RCH_".$this->arParams['BLOCK_ID']."_template");
        $this->includeComponentTemplate();
    }
}