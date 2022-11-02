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
                close :          '<i class="isax close-square">',
                previous :       '<i class="isax left">',
                next :           '<i class="isax right">',
                xhrError :       'Ошибка загрузки содержимого',
                imgError :       'Ошибка загрузки изображения',
                slideshowStart : '<i class="isax play">',
                slideshowStop :  '<i class="isax pause">',
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

// region

const bxAjaxRequest = (component, action) => {

    const query = {
              c :      component, // component class : component name
              action : action,        // action name
              mode :   'class'
          };

    const url = '/bitrix/services/main/ajax.php',
          params = $.param(query, true);

    return url + '?' + params;

};

// endregion
