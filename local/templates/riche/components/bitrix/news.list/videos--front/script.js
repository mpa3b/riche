$(() => {

    tns(
        {
            container: ".videos--front .slider",
            items    : 2,
            slideBy  : 1,

            mode     : "carousel",
            loop     : true,
            mouseDrag: true,

            controls: false,

            nav: false,

            autoplay            : false,
            autoplayButtonOutput: false,
            autoplayTimeout     : 5000,

            speed: 500,

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

            //const playing = 'playing';

            let target = $(event.currentTarget);

            $.colorbox(
                {
                    inline    : true,
                    href      : target.attr('href'),
                    className : 'no-borders',
                    /*
                    onComplete: () => {

                        let popup       = $('.popup-video', '#colorbox'),
                            video       = $('video', popup),
                            playButton  = $('button.play', popup),
                            pauseButton = $('button.pause', popup);

                        playButton.on(
                            'click',
                            () => {

                                video.trigger('play').addClass(playing);

                            }
                        );

                        pauseButton.on(
                            'click',
                            () => {

                                video.trigger('pause').removeClass(playing);

                            }
                        );

                    },
                    onClosed  : () => {

                        let video = $('video');

                        video.trigger('pause').removeClass(playing);

                    }
                    */
                }
            );

        }
    );

});