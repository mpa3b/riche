$(() => {

    let cartElement = $('.cart--default');

    let cart = $.ajax(
        bxAjaxRequestUrl('local:cart'),
        {
            data:    {
                method: 'GET',
                sessid: sessid
            },
            success: (response) => {

                return response;

            }
        }
    );

    console.debug(cart);

    Vue.component(
        'cart',
        {
            template: 'todo-list',
            data:     () => {
                return {
                    items:   [
                        {
                            id:       1,
                            name:     'Товар 1',
                            images:   {
                                preload: '/images/p1-preload.png',
                                mobile:  '/images/p1-mobile.png',
                                desktop: '/images/p1-desktop.png'
                            },
                            price:    1000,
                            discount: 200,
                            quantity: 2
                        },
                        {
                            id:       2,
                            name:     'Товар 2',
                            images:   {
                                preload: '/images/p2-preload.png',
                                mobile:  '/images/p2-mobile.png',
                                desktop: '/images/p2-desktop.png'
                            },
                            price:    1000,
                            discount: 0,
                            quantity: 1
                        }
                    ],
                    deliery: 500
                }
            }
        }
    );

});

/**
 * Документация по BX AJAX API тут:
 *
 * @link https://verstaem.com/ajax/new-bitrix-ajax/
 * @link https://machaon-dev.github.io/blog/posts/bitrix-ajax-controllers/
 * @link https://prominado.ru/blog/novye-ajax-zaprosy-v-bitrix/
 * @link https://verstaem.com/ajax/new-bitrix-ajax/
 * @link https://yunaliev.ru/2010/02/bitrix-ajax/
 **/

/**
 * Документация по Vue для примера тут:
 *
 * @link https://github.com/denx-b/bitrix-vue-component
 */
