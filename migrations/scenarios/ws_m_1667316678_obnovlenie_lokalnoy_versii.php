<?php

/**
 * Class definition update migrations scenario actions
 **/
class ws_m_1667316678_obnovlenie_lokalnoy_versii extends \WS\Migrations\ScriptScenario {

    /**
     * Name of scenario
     **/
    static public function name() {
        return "Обновление локальной версии";
    }

    /**
     * Description of scenario
     **/
    static public function description() {
        return "";
    }

    /**
     * @return array First element is hash, second is owner name
     */
    public function version() {
        return array("68d659c63ee7d00d71ea7c910d929196", "");
    }

    /**
     * Write action by apply scenario. Use method `setData` for save need rollback data
     **/
    public function commit() {
        // my code
    }

    /**
     * Write action by rollback scenario. Use method `getData` for getting commit saved data
     **/
    public function rollback() {
        // my code
    }
}