$(() => {

    const element = $('.cart--default');

    const data = {
        price :    1000,
        delivery : 500,
        total :    1500,
        items :    {
            1 : {
                id :             1,
                name :           'Test 1',
                description :    'Test 1',
                picture :        {
                    preload : '/upload/images/1-preload.png',
                    mobile :  '/upload/images/1-mobile.png',
                    desktop : '/upload/images/1-desktop.png'
                },
                base_price :     1000,
                discount_price : 800,
                quantity :       2,
                total :          1600
            },
            2 : {
                id :             2,
                name :           'Test 2',
                picture :        {
                    mobile :  '/upload/images/2-mobile.png',
                    desktop : '/upload/images/2-desktop.png'
                },
                base_price :     1200,
                discount_price : 900,
                quantity :       3,
                total :          2700
            },
            3 : {
                id :             3,
                name :           'Test 3',
                picture :        {
                    mobile :  '/upload/images/3-mobile.png',
                    desktop : '/upload/images/3-desktop.png'
                },
                base_price :     700,
                discount_price : 500,
                quantity :       1,
                total :          500
            }
        }
    };

    let cart = new Vue(
        {
            element : '.cart--default .cart',
            data :    data,
            methods : {},
            mounted() {


            }
        }
    );

    let cart_items = new Vue(
        {
            element : '.cart--default .items',
            data :    data,
            methods : {},
            mounted() {


            }
        }
    );

    Vue.component(
        'cart_item',
        {

        }
    );

});
