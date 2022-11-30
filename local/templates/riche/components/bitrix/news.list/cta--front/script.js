$(() => {

    const sliderFront = $('.cta--front');

    const sliderFrontSlider = $('.slider', sliderFront);

    sliderFrontSlider
        .slick(
            {
                slidesToShow:   1,
                slidesToScroll: 1,
                fade:           false,
                speed:          1000,
                autoplay:       false,
                autoplaySpeed:  5000,
                arrows:         false,
                dots:           true,
                infinite:       false,
                mobileFirst:    true,
                responsive:     [
                    {
                        breakpoint: breakpoint.mobile,
                        settings:   {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: breakpoint.tablet,
                        settings:   {
                            slidesToShow: 3
                        }
                    },
                ]
            }
        );

    $('button', sliderFrontSlider).on(
        'click',
        (event) => {

            event.preventDefault();

        }
    );

});
