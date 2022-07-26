$(() => {

    tns(
        {
            container: ".banners--front--slider .slider",
            items    : 1,
            slideBy  : 1,

            mode     : "gallery",
            loop     : true,
            mouseDrag: true,

            controls: false,
            
            nav: false,

            autoplay            : false,
            autoplayButtonOutput: false,
            autoplayTimeout     : 3000,

            speed: 300
        }
    );

});