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

    $(document).on(
        'click',
        'button',
        cartElement,
        (event) => {

            let button = $(event.target),
                data   = button.data();

            data.sessid = sessid;

            $.ajax(
                bxAjaxRequestUrl('local:cart'),
                {
                    data:    data,
                    success: (result) => {

                        console.debug(result);

                    }
                }
            );

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
