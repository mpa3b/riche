$(() => {

    const articlesFront = $('.articles--front');

    let articlesFrontSlider = $('.slider', articlesFront);

    articlesFrontSlider.slick(
        {
            slidesToShow:   2,
            slidesToScroll: 1,
            centerMode:     false,
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
                    breakpoint: breakpoint.mobile,
                    settings:   {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: breakpoint.desktop,
                    settings:   {
                        slidesToShow: 4
                    }
                },
            ]
        }
    );

});
