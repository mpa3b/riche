$(() => {

    const frontReviews = $('.reviews--front');

    let frontReviewsSlider = $('.slider', frontReviews);

    frontReviewsSlider.slick(
        {
            slidesToShow:   1,
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
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 780,
                    settings:   {
                        slidesToShow: 3
                    }
                },
            ]
        }
    );

});
