<div id="<?=$arResult['SECTION_ID']?>"></div>

<template id="<?=$arResult['TEMPLATE_ID']?>">
    <ul>
        <li v-for="banner in banners" class="banner_item">
            <picture>
                <source :srcset="image(banner).mobile" media="(max-width: 568px)">
                <source :srcset="image(banner).desktop" media="(min-width: 568px)">
                <img
                    class="lazy"
                    src="/res/spacer.gif">
            </picture>
            {{ banner.NAME }}
        </li>
    </ul>
</template>


<script>
    App.template = "#<?=$arResult['TEMPLATE_ID']?>";
    const app = Vue.createApp({
        render: () => Vue.h(App)
    }, {
        data: JSON.parse('<?=$arResult['RESULT']?>')
    }).mount("#<?=$arResult['SECTION_ID']?>");
</script>
