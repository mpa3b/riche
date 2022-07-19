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

    <div id="menu--footer">

        <nav role="navigation">

            <ul class="menu">

                <?php foreach ($arResult['ITEMS'] as $arItem): ?>

                    <li>
                        <a href="<?= $arItem['link']; ?>"><?= $arItem['name']; ?></a>
                    </li>

                <?php endforeach; ?>

            </ul>

        </nav>

    </div>

<?php } ?>