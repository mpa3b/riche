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
                autoplay:       true,
                autoplaySpeed:  5000,
                arrows:         false,
                dots:           true,
                infinite:       true,
                mobileFirst:    true
            }
        )
        .on(
            {
                afterChange:  (event, slick, currentSlide, nextSlide) => {

                    let video   = $('video', event.currentTarget),
                        picture = $('picture', event.currentTarget);

                    if (video.length) {
                        video.trigger('play');
                        picture.fadeOut();
                    }

                },
                beforeChange: (event, slick, currentSlide, nextSlide) => {

                    let video = $('video', event.currentTarget);

                    video.trigger('pause');

                }
            }
        );

    $('button', bannersFrontSlider).on(
        'click',
        (event) => {

            event.preventDefault();

        }
    );

});
