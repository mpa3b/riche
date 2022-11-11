$(() => {

    const sliderFront = $('.cta--front');

    const sliderFrontSlider = $('.slider', sliderFront);

    sliderFrontSlider
        .slick(
            {
                slidesToShow:   1,
                slidesToScroll: 1,
                fade:           true,
                speed:          1000,
                autoplay:       false,
                autoplaySpeed:  5000,
                arrows:         false,
                dots:           true,
                infinite:       true,
                mobileFirst:    true,
                responsive:     [
                    {
                        breakpoint: breakpoint.mobile,
                        settings:   {
                            fade:         false,
                            dots:         false,
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: breakpoint.tablet,
                        settings:   {
                            slidesToShow: 3,
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
