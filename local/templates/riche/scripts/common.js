document.addEventListener("DOMContentLoaded", function(event) {
    const app = Vue.createApp({
        name: 'RICHE',
        components: {
            MenuComponent,
            BannerComponent
        }
    });
    app.mount("#vue-app");
    window.app = app;
});