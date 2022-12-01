$(() => {

    const catalogSection = $('.catalog-section--catalog--slider');

    const catalogSectionSlider = $('.slider', catalogSection);
    const catalogSectionSliderVideo = $('video', catalogSectionSlider);

    catalogSectionSliderVideo.on(
        'loaded',
        (event) => {

            let container = $(event.currentTarget).closest('.slide'),
                picture   = $('picture', container);

            picture.fadeOut();

        }
    );

    catalogSectionSlider
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
        )
        .on(
            {
                afterChange:  (event, slick, currentSlide, nextSlide) => {

                    let element = slick.$slides[currentSlide];

                    $('video', element).trigger('play');

                },
                beforeChange: (event, slick, currentSlide, nextSlide) => {

                    let element = slick.$slides[currentSlide];

                    $('video', element).trigger('pause');

                }
            }
        );

});
