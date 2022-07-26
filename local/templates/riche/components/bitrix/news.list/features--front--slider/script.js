$(() => {

    tns(
        {
            container: ".features--front--slider .slider",
            items    : 1,
            slideBy  : 1,

            mode     : "carousel",
            loop     : true,
            mouseDrag: true,

            controls: false,
            
            nav: false,

            autoplay            : false,
            autoplayButtonOutput: false,
            autoplayTimeout     : 5000,

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

});