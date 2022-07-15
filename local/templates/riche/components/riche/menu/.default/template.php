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
<ul id="main_menu">
    <?foreach ($arResult['ITEMS'] as $arMenu): ?>
        <li>
            <a href="<?=$arMenu['1']?>"><?=$arMenu['0']?></a>
        </li>
    <?endforeach;?>
</ul>