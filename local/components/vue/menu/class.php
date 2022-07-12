<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

class VueMenuComponent extends \CBitrixComponent
{
    public function onPrepareComponentParams($params)
    {
        return $params;
    }

    public function executeComponent()
    {

        $this->arResult['RESULT'] = json_encode($this->getMenuItems());

        $this->includeComponentTemplate();

    }

    private function getMenuItems() {

        $items = [];

        return $items;

    }

}