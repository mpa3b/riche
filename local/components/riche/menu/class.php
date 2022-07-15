<?php

use Bitrix\Main\Data\Cache;

class MenuComponent extends CBitrixComponent
{
    public function executeComponent(){
        $aMenuLinks = [];

        $cache = Cache::createInstance();
        if ($cache->initCache($this->arParams['CACHE_TIME'], $this->arParams['MENU_ITEMS']."_menu")) {
            //TODO: Переделать сборку меню в нормальный вид name=> link=>
            $this->arResult['ITEMS'] = $cache->getVars();
        }
        elseif ($cache->startDataCache()) {

            if(file_exists($_SERVER["DOCUMENT_ROOT"].'/'.$this->arParams['MENU_ITEMS'].'.menu_ext.php'))
                require_once $_SERVER["DOCUMENT_ROOT"].'/'.$this->arParams['MENU_ITEMS'].'.menu_ext.php';

            $cache->endDataCache($aMenuLinks);

            $this->arResult['ITEMS'] = $aMenuLinks;
        }

        $this->includeComponentTemplate();
    }

}