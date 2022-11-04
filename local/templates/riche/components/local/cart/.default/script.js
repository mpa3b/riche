$(() => {

    const element = $('.cart--default');

    let data = {
            action : 'update'
        },
        cart;

    $.bxAjax(
        data,
        (response) => {

            console.debug(response);
            cart = response;

        }
    );

});
