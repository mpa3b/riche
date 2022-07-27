$(() => {

    tns(
        {
            container: ".videos--front .slider",
            items    : 2,
            slideBy  : 1,

            mode     : "carousel",
            loop     : false,
            mouseDrag: true,

            controls: false,

            nav: false,

            autoplay            : false,
            autoplayButtonOutput: false,
            autoplayTimeout     : 5000,

            speed: 2000,

            responsive: {
                578: {
                    items: 2
                },
                992: {
                    items: 3
                }
            }
        }
    );

    const element = $('.videos--front');
    const video = $('.item', element);
    const popupTrigger = $('.modal--video', video);

    popupTrigger.on(
        'click',
        (event) => {

            event.preventDefault();

            let target = $(event.currentTarget);

            $.colorbox(
                {
                    inline   : true,
                    href     : target.attr('href'),
                    className: 'no-borders',
                    rel      : 'videos--front',
                    onOpen   : () => {


                    },
                    onClosed : () => {


                    }
                }
            );

        }
    );

});