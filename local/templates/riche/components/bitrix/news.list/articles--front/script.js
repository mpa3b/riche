$(() => {

    const articlesFront = $('.articles--front');

    let articlesFrontSlider = $('.slider', articlesFront);

    articlesFrontSlider.slick(
        {
            slidesToShow:   2,
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
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 780,
                    settings:   {
                        slidesToShow: 4
                    }
                },
            ]
        }
    );

});
