<?php

use Bitrix\Main\Data\Cache;

class MenuComponent extends CBitrixComponent
{
    public function executeComponent()
    {
        $aMenuLinks = [];

        $cache = Cache::createInstance();

        $menuName = $this->arParams['MENU_NAME'];

        if ($cache->initCache($this->arParams['CACHE_TIME'], $menuName . "_menu")) {

            $this->arResult['ITEMS'] = $cache->getVars();

        } else if ($cache->startDataCache()) {

            if (file_exists($_SERVER["DOCUMENT_ROOT"] . '/.' . $menuName . '.menu.php'))
                require_once $_SERVER["DOCUMENT_ROOT"] . '/.' . $menuName . '.menu.php';

            if (file_exists($_SERVER["DOCUMENT_ROOT"] . '/.' . $menuName . '.menu_ext.php'))
                require_once $_SERVER["DOCUMENT_ROOT"] . '/.' . $menuName . '.menu_ext.php';

            foreach ($aMenuLinks as $menuItem) {

                $resultMenu[] = [
                    'name'     => $menuItem[0],
                    'link'     => $menuItem[1],
                    'property' => $menuItem[3]
                ];

            }

            $cache->endDataCache($resultMenu);

            $this->arResult['ITEMS'] = $resultMenu;

        }

        $this->includeComponentTemplate();

    }

}