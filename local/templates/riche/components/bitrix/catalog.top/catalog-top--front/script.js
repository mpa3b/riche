$(() => {

    const frontCatalogTop = $('.catalog-top--front');

    const frontCatalogSlider       = $('.slider', frontCatalogTop),
          frontCatalogSliderParams = {
              slidesToShow:   2,
              slidesToScroll: 1,
              fade:           false,
              speed:          1000,
              autoplay:       true,
              arrows:         false,
              dots:           false,
              infinite:       true,
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
                          slidesToShow: 5
                      }
                  }
              ]
          };

    frontCatalogSlider
        .slick(frontCatalogSliderParams)
        .on(
            {
                afterChange:  (event, slick, currentSlide) => {

                    let element = slick.$slides[currentSlide],
                        video   = $('video', element);

                    video.trigger('play');

                },
                beforeChange: (event, slick, currentSlide) => {

                    let element = slick.$slides[currentSlide],
                        video   = $('video', element);

                    video.trigger('pause');

                }
            }
        );

    // region filter

    let frontCatalogTopFiltered = false;

    $('button.filter-button').on(
        'click',
        frontCatalogTop,
        (event) => {

            let button = $(event.currentTarget),
                id     = button.data('id');

            console.debug(frontCatalogSlider);

            if (frontCatalogTopFiltered === false) {

                frontCatalogTopFiltered = true;

            } else {

                frontCatalogTopFiltered = false;
            }

        }
    );

    // endregion

    // region video

    const frontCatalogSliderVideo = $('video', frontCatalogSlider),
          videoPlayingClass       = 'playing';

    frontCatalogSliderVideo.on(
        {
            loaded: (event) => {

                let container = $(event.currentTarget).closest('.slide'),
                    picture   = $('picture', container);

                picture.fadeOut();

            },
            play:   (event) => {

                $(event.currentTarget).addClass(videoPlayingClass);

            },
            pause:  (event) => {

                $(event.currentTarget).removeClass(videoPlayingClass);

            }
        }
    );

    // endregion

});
