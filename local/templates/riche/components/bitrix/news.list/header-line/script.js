$(() => {

    tns(
        {
            container: "#news-list--header-line .slider",
            items    : 1,
            mode     : "gallery",
            loop     : false,
            mouseDrag: true,

            controls: false,

            nav: false,

            autoplay            : true,
            autoplayButtonOutput: false,
            autoplayTimeout     : 3000
        }
    );

});
