<div id="<?=$arResult['SECTION_ID']?>"></div>

<template id="<?=$arResult['TEMPLATE_ID']?>">
    <ol>
        <li v-for="banner in banners" class="banner_item">
            {{ banner.NAME }}
            <img :src="imageUrl(banner)" width="400px">
        </li>
    </ol>
</template>


<script type="text/javascript">
    App.template = "#<?=$arResult['TEMPLATE_ID']?>";
    App.methods.addData('<?=$arResult['RESULT']?>');
    const app = Vue.createApp({
        render: () => Vue.h(App)
    })
    app.mount("#<?=$arResult['SECTION_ID']?>");
</script>