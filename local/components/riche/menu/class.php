<?php

class MenuComponent extends CBitrixComponent
{
    public function executeComponent(){
        $this->arResult['SECTION_ID'] = strtolower("RCH_".$this->arParams['BLOCK_ID']);
        $this->arResult['TEMPLATE_ID'] = strtolower("RCH_".$this->arParams['BLOCK_ID']."_template");
        $this->arResult['RESULT'] = json_encode($this->arParams['MENU_ITEMS']);
        $this->includeComponentTemplate();
    }

}