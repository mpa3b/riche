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
<script type="text/template" id="menu--template">
    <ul class="menu-wrapper">

        <% // repeat items
        _.each(items,function(item,key,list){
        %>
            <li class="<%= key %>">
                <a href="<%- item.link %>"><%- item.name %></a>
            </li>
        <% }); %>
    </ul>
</script>
<div id="menu--template-element"></div>