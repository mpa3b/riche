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
                infinite:       true,
                mobileFirst:    true,
                responsive:     [
                    {
                        breakpoint: breakpoint.tablet,
                        settings:   {
                            slidesToShow: 2,
                            fade:         false,
                            dots:         false,
                        }
                    },
                    {
                        breakpoint: breakpoint.desktop,
                        settings:   {
                            slidesToShow: 4,
                            fade:         false,
                            dots:         false,
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
