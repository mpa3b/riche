$(() => {

    tns({
            container: ".videos--front .slider", items: 2, slideBy: 1,

            mode: "carousel", loop: false, mouseDrag: true,

            controls: false,

            nav: false,

            autoplay: false, autoplayButtonOutput: false, autoplayTimeout: 5000,

            speed: 2000,

            responsive: {
                578: {
                    items: 3
                }
            }
        });

    const element = $('.videos--front');
    const video = $('.item', element);

    const popupTrigger = $('.modal--video', video);

    popupTrigger.on('click', (event) => {

        event.preventDefault();

        let href = $(event.currentTarget).attr('href');

        $.colorbox({
                       inline: true, href: href, className: 'no-borders', onOpen: () => {


            }, onClosed      : () => {


            }
                   });

    });

});