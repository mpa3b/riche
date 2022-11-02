$(() => {

    const element = $('.cart--default'),
          component = 'riche:cart';

    $(document).on(
        'click',
        $('button', element),
        (event) => {

            event.preventDefault();

            let button = $(event.currentTarget),
                id = button.data('id'),
                action = button.data('action');

            $.ajax(
                bxAjaxRequest(component, action),
                {
                    data: {
                        id: id
                    }
                }
            );

        }
    )


    // URL надо вынести в статику.
    // генерацию параметров запроса вмиесте с адресом можно вынести в глобальную функцию.

    let request = $.ajax(
        '/bitrix/services/main/ajax.php?' + $.param(query, true),
        {
            method: 'POST',
            data  : {
                params: form.serializeArray(),
                sessid: BX.message("bitrix_sessid")
            }
        }
    );

    $.ajax(
        bxAjaxRequest(component, 'add'),
        {

        }
    );

});
