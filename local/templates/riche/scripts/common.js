// region кнопка с индикатором прогресса

$(document).on(
    'click',
    'button.progress',
    (event) => {

        const throbber = 'throbber';

        let button = $(event.currentTarget),
            icon   = $('.icon', button);

        $(document).on(
            {
                ajaxStart:    () => {

                    icon.addClass(throbber);

                },
                ajaxComplete: () => {

                    icon.removeClass(throbber);

                }
            }
        );

    }
);

// endregion
