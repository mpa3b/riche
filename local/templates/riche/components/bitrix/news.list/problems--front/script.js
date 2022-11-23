$(() => {

    console.debug('##');

    const problems = $('.problems--front');

    let frontProblemsSlider = $('.slider', problems);

    frontProblemsSlider.slick(
        {
            slidesToShow:   2,
            slidesToScroll: 1,
            fade:           false,
            speed:          1000,
            autoplay:       false,
            autoplaySpeed:  5000,
            arrows:         true,
            prevArrow:      '<button class="arrow transparent prev"><i class="icon-chevron-left"></button>',
            nextArrow:      '<button class="arrow transparent next"><i class="icon-chevron-right"></button>',
            dots:           false,
            infinite:       true,
            mobileFirst:    true,
            responsive:     [
                {
                    breakpoint: breakpoint.mobile,
                    settings:   {
                        slidesToShow: 3,
                        infinite:     false
                    }
                },
                {
                    breakpoint: breakpoint.tablet,
                    settings:   {
                        slidesToShow: 4,
                        infinite:     false
                    }
                },
            ]
        }
    );

});
