'use strict';

$(document).on(
    'click',
    'button.progress',
    (event) => {

        let throbber = 'throbber',
            button   = $(event.currentTarget),
            icon     = $('.icon', button);

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
            scrolling     : false
        }
    );

    BX.ready(
        () => {

            if (BX.Browser.isMobile()) {

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
                        bottom        : 0,
                        maxWidth      : '100%',
                        maxHeight     : '90%',
                        fixed         : true,
                        scrolling     : false
                    }
                );

            }

        }
    );

}

const validateEmailAddress = (email) => {

    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);

};

$(() => {


});