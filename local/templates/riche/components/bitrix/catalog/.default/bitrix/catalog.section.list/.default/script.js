$(() => {

    const catalogSectionList = $('.section-list--catalog--default');
    const catalogSectionListSlider = $('.slider', catalogSectionList);

    catalogSectionListSlider
        .slick(
            {
                slidesToShow:   2,
                slidesToScroll: 1,
                fade:           false,
                autoplay:       false,
                arrows:         false,
                dots:           false,
                infinite:       false,
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
