$(document).on(
    'click',
    'button.progress',
    (event) => {

        const throbber = 'throbber';

        let button = $(event.currentTarget),
            icon   = $('.icon', button);

        $(document).on(
            {
                ajaxStart :    () => {

                    icon.addClass(throbber);

                },
                ajaxComplete : () => {

                    icon.removeClass(throbber);

                }
            }
        );

    }
);

$(() => {

    if (typeof $.colorbox == 'function') {

        $.extend(
            $.colorbox.settings,
            {
                current :        '{current} / {total}',
                close :          '<i class="icon close-square">',
                previous :       '<i class="icon left">',
                next :           '<i class="icon right">',
                xhrError :       'Ошибка загрузки содержимого',
                imgError :       'Ошибка загрузки изображения',
                slideshowStart : '<i class="icon play">',
                slideshowStop :  '<i class="icon pause">',
                maxWidth :       '88%',
                maxHeight :      '72%',
                fixed :          true,
                scrolling :      false,
                opacity :        0.77
            }
        );

        if (BX && BX.Browser.isMobile()) {

            $.extend(
                $.colorbox.settings,
                {
                    maxWidth :  '100%',
                    maxHeight : '90%'
                }
            );

        }

    }

});

// region bxAjax

$.extend(
    {
        bxAjax : (component, data, method = 'GET') => {

            const url   = '/bitrix/services/main/ajax.php',
                  query = {
                      c :      component,
                      action : data.action,
                      mode :   'class'
                  };

            const params = $.param(query, true);

            delete data.action;

            data.sessid = sessid;

            console.debug(data);
            console.debug(query);
            console.debug(params);

            let request = $.ajax(
                url + '?' + params,
                {
                    method : method,
                    cache :  false,
                    data :   data
                }
            );

            let result;

            request.done(
                (response) => {

                    result = response;

                }
            );

            console.debug(result);

            return result;

        }
    }
);

// endregion
