<?
/**
 * Bitrix vars
 *
 * @var CBitrixComponentTemplate $this
 * @var CBitrixComponent         $component
 *
 * @var array                    $arParams
 * @var array                    $arResult
 *
 * @var string                   $templateName
 * @var string                   $templateFile
 * @var string                   $templateFolder
 * @var array                    $templateData
 *
 * @var string                   $componentPath
 * @var string                   $parentTemplateFolder
 *
 * @var CDatabase                $DB
 * @var CUser                    $USER
 * @var CMain                    $APPLICATION
 */
?>
<?php if (!empty($arResult['ITEMS'])) { ?>
    <ul id="menu--default">
        <?php foreach ($arResult['ITEMS'] as $arMenu): ?>
            <li>
                <a href="<?= $arMenu['link'] ?>"><?= $arMenu['name'] ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php } ?>