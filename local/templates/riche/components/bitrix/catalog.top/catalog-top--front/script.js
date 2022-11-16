$(() => {

    const catalogTop = $('.catalog-top--front');

    let frontCatalogSlider = $('.slider', catalogTop);

    frontCatalogSlider.slick(
        {
            slidesToShow:   2,
            slidesToScroll: 1,
            fade:           false,
            speed:          1000,
            autoplay:       false,
            arrows:         false,
            dots:           false,
            infinite:       true,
            mobileFirst:    true,
            responsive:     [
                {
                    breakpoint: breakpoint.tablet,
                    settings:   {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: breakpoint.desktop,
                    settings:   {
                        slidesToShow: 4
                    }
                }
            ]
        }
    );

});
