$(() => {

    const catalogTop = $('.catalog-top--catalog--slider');

    // region slider

    const catalogTopSlider       = $('.slider', catalogTop),
          catalogTopSliderParams = {
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
          };

    // endregion

    // region video

    catalogTopSlider
        .slick(
            catalogTopSliderParams
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

    const catalogTopSliderVideo = $('video', catalogTopSlider),
          parentSelector        = '.item',
          videoPlayingClass     = 'playing';

    catalogTopSliderVideo.on(
        {
            loaded: (event) => {

                let container = $(event.currentTarget).closest(parentSelector),
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


    // region element hover

    const catalogTopItem = $('.item', catalogTop);

    catalogTopItem.on(
        'mouseenter',
        (event) => {

            let catalogTopItemVideo = $('video', catalogTopItem);

            catalogTopItemVideo.trigger('pause');

            let currentItem = $(event.currentTarget);

            $('video', currentItem).trigger('play');

        }
    );

    // endregion

});
