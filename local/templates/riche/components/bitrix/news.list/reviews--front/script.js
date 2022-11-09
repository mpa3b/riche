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

});
