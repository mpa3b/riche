$(() => {

    const cartElement = $('.cart--default');

    let cart;

    $.ajax(
        bxAjaxRequestUrl('local:cart'),
        {
            data: {
                sessid: sessid,
                method: 'GET',
            },
            success: (response) => {

                console.debug(response);

                cart = response;

            },
            complete: () => {

                console.debug(cart);

            }
        }
    );

    $(document).on(
        'click',
        'button',
        cartElement,
        (event) => {

            console.debug(event);

            let button = $(event.target),
                buttonData = button.data();

            console.debug(buttonData);

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
