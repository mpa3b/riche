<template id="banner--template">
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

<script type="module">
    export default {
        components: {
            BannerComponent
        }
    };
</script>

