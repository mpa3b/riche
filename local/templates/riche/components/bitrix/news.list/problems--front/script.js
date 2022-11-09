$(() => {

    const problems = $('.problems--front');

    let frontProblemsSlider = $('.slider', problems);

    frontProblemsSlider.slick(
        {
            slidesToShow:   3,
            slidesToScroll: 1,
            fade:           false,
            speed:          1000,
            autoplay:       true,
            autoplaySpeed:  5000,
            arrows:         false,
            dots:           false,
            infinite:       false,
            mobileFirst:    true,
            responsive:     [
                {
                    breakpoint: 580,
                    settings:   {
                        slidesToShow: 4
                    }
                },
                {
                    breakpoint: 780,
                    settings:   {
                        slidesToShow: 5
                    }
                },
            ]
        }
    );

});
