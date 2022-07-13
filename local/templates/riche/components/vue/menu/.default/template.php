<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/** @var array $arParams */
/** @var array $arResult */
/** @global \CMain $APPLICATION */
/** @global \CUser $USER */
/** @global \CDatabase $DB */
/** @var \CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var array $templateData */
/** @var \CBitrixComponent $component */

$this->setFrameMode(false); // Композит БУС работать не будет, у нас нет BX.

?>

<?
// HTML ID формируется из имени компонента и имени шаблона, нужно автоматизировать ?>

    <div id="menu--default"></div>

    <template component="Menu">
        <nav>
            <ul>
                <li v-for="item in items">
                    <i v-if="item.icon" :data-icon="icon"></i>
                    <a :href="item.href" v-if="item.title">{{ item.name }}</a>
                </li>
            </ul>
        </nav>
    </template>

<?

/**
 * Типовой Vue-компонент сам должен докидывать в тело структуру данных в JSON с указанным ключём и связывать их с шаблоном.
 * Указывать каждый раз вручную что-то не должно быть нужно.
 * Только в случае, если требуется переопределение или дополнение.
 */

?>