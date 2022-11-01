<?php

    use WS\ReduceMigrations\Module;

    CModule::IncludeModule('ws.reducemigrations');
define("ADMIN_MODULE_NAME", Module::getName());
CJSCore::Init(array('window', 'jquery', 'dialog'));
