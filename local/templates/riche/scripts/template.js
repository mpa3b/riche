const Page = Vue.createApp(
    {
        name : 'Base page',
        mount: '#vue-root'
    }
);

document.addEventListener(
    'DOMContentLoaded',
    () => {

        Page.mount();

    }
);