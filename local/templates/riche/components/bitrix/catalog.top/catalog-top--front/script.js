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

    let catalogTopFiltered = false;

    $('button.filter-button').on(
        'click',
        catalogTop,
        (event) => {

            let button = $(event.currentTarget),
                id     = button.data('id');

            if (catalogTopFiltered === false) {

                frontCatalogSlider.slick('slickFilter', '.item[data-section-id="' + id + '"]');

                catalogTopFiltered = true;

            } else {

                frontCatalogSlider.slick('slickUnfilter');

                catalogTopFiltered = false;
            }

        }
    );

});
