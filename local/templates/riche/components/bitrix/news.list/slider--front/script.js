$(() => {

    const sliderFront = $('.slider--front');

    const sliderFrontSlider = $('.slider', sliderFront);
    const sliderFrontSlideVideo = $('video', sliderFrontSlider);

    sliderFrontSlideVideo.on(
        'loaded',
        (event) => {

            let container = $(event.currentTarget).closest('.slide'),
                picture   = $('picture', container);

            picture.fadeOut();

        }
    );

    sliderFrontSlider
        .slick(
            {
                slidesToShow:   1,
                slidesToScroll: 1,
                fade:           true,
                speed:          1000,
                autoplay:       true,
                autoplaySpeed:  5000,
                arrows:         false,
                dots:           true,
                infinite:       true,
                mobileFirst:    true,
                responsive:     [
                    {
                        breakpoint: 580,
                        settings:   {
                            fade:         false,
                            dots:         false,
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 780,
                        settings:   {
                            slidesToShow: 3,
                            fade:         false,
                            dots:         false,
                        }
                    },
                ]
            }
        )
        .on(
            {
                afterChange:  (event, slick, currentSlide, nextSlide) => {

                    let video   = $('video', event.currentTarget),
                        picture = $('picture', event.currentTarget);

                    if (video.length) {
                        video.trigger('play').prop('muted', true);
                        picture.fadeOut();
                    }

                },
                beforeChange: (event, slick, currentSlide, nextSlide) => {

                    let video = $('video', event.currentTarget);

                    video.trigger('pause');

                }
            }
        );

    $('button', sliderFrontSlider).on(
        'click',
        (event) => {

            event.preventDefault();

        }
    );

});
