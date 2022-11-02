$(() => {

    const query = {
        c     : 'riche:cart', // component class : component name
        action: 'add',        // action name
        mode  : 'class'
    };

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

    request.done(
        (response) => {

            if (response.status == 'success') {

                console.debug(response);

            } else {

                console.debug(response);

            }

        }
    );

});
