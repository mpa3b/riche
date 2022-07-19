<?php

use Bitrix\Main\Data\Cache;

class MenuComponent extends CBitrixComponent
{
    public function executeComponent(){
        $aMenuLinks = [];

        $cache = Cache::createInstance();
        if ($cache->initCache($this->arParams['CACHE_TIME'], $this->arParams['MENU_ITEMS']."_menu")) {
            $this->arResult['ITEMS'] = $cache->getVars();
        }
        elseif ($cache->startDataCache()) {

            if(file_exists($_SERVER["DOCUMENT_ROOT"].'/.'.$this->arParams['MENU_ITEMS'].'.menu.php'))
                require_once $_SERVER["DOCUMENT_ROOT"].'/.'.$this->arParams['MENU_ITEMS'].'.menu.php';

            if(file_exists($_SERVER["DOCUMENT_ROOT"].'/.'.$this->arParams['MENU_ITEMS'].'.menu_ext.php'))
                require_once $_SERVER["DOCUMENT_ROOT"].'/.'.$this->arParams['MENU_ITEMS'].'.menu_ext.php';


            foreach ($aMenuLinks as $menuItems) {
                $resultMenu[] = [
                    'name' => $menuItems[0],
                    'link' => $menuItems[1],
                    'property' => $menuItems[3]
                ];
            }

            $cache->endDataCache($resultMenu);

            $this->arResult['ITEMS'] = $resultMenu;
        }

        $this->includeComponentTemplate();
    }

}