$(() => {

    const bannersFront = $('.banners--front');

    const bannersFrontSlider = $('.slider', bannersFront);
    const bannersFrontSlideVideo = $('video', bannersFrontSlider);

    bannersFrontSlideVideo.on(
        'loaded',
        (event) => {

            let container = $(event.currentTarget).closest('.slide'),
                picture   = $('picture', container);

            picture.fadeOut();

        }
    );

    bannersFrontSlider
        .slick(
            {
                slidesToScroll: 1,
                fade:           true,
                speed:          1000,
                autoplay:       false,
                autoplaySpeed:  5000,
                arrows:         false,
                dots:           true,
                infinite:       true,
                mobileFirst:    true,
                loading:        'progressive'
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

    $('button', bannersFrontSlider).on(
        'click',
        (event) => {

            event.preventDefault();

            let url = $(event.currentTarget).data('href');

            window.location.href = url;

        }
    );

});
