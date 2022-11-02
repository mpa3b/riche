import {forEach} from 'local/assets/tiny-slider/src/helpers/forEach';

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
