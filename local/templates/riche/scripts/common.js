document.addEventListener("DOMContentLoaded", function(event) {
    const app = Vue.createApp({
        name: 'RICHE',
        components: {
            BannerComponent
        }
    });
    app.mount("#vue-app");
    window.app = app;
});