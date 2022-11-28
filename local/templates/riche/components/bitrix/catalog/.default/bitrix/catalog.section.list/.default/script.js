$(() => {

    const catalogSectionList = $('.section-list--catalog--default');

    const catalogSectionListSlider = $('.slider', catalogSectionList);

    catalogSectionListSlider
        .slick(
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
                lazyload:       'progressive',
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
