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
                    items: 3
                },
                992: {
                    items: 4
                }
            }
        }
    );

});