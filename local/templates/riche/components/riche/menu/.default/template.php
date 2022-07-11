<div id="<?=$arResult['SECTION_ID']?>"></div>

<template id="<?=$arResult['TEMPLATE_ID']?>">
    <ul class="menu-wrapper">
        <li v-for="menu in menuItems">
            <a :href="menu.link">{{ menu.name }}</a>
        </li>
    </ul>
</template>


<script type="text/javascript">
    Menu.template = "#<?=$arResult['TEMPLATE_ID']?>";
    Vue.createApp({
        render: () => Vue.h(Menu)
    }, {
        data: JSON.parse('<?=$arResult['RESULT']?>')
    }).mount("#<?=$arResult['SECTION_ID']?>");
</script>