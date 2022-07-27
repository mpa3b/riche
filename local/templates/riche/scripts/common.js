'use strict';

$(document).on(
    'click',
    'button.progress',
    (event) => {

        const throbber = 'throbber';

        let button = $(event.currentTarget),
            icon   = $('.icon', button);

        $(document).on(
            {
                ajaxStart   : () => {

                    icon.addClass(throbber);

                },
                ajaxComplete: () => {

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
                current       : '{current} / {total}',
                close         : 'Закрыть',
                previous      : 'Обратно',
                next          : 'Дальше',
                xhrError      : 'Ошибка загрузки содержимого',
                imgError      : 'Ошибка загрузки изображения',
                slideshowStart: 'Hачать слайд-шоу',
                slideshowStop : 'Остановить',
                maxWidth      : '88%',
                maxHeight     : '72%',
                fixed         : true,
                scrolling     : false,
                opacity       : 0.77
            }
        );


        if (BX && BX.Browser.isMobile()) {

            $.extend(
                $.colorbox.settings,
                {
                    maxWidth : '100%',
                    maxHeight: '90%'
                }
            );

        }

    }

});