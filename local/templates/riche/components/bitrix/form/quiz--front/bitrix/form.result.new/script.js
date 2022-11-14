$(() => {

    const element = $('.quiz-front--new');

    const quizSlider = $('.fields', element);

    quizSlider.slick(
        {
            slidesToShow:   1,
            slidesToScroll: 1,
            fade:           false,
            speed:          1000,
            autoplay:       false,
            autoplaySpeed:  5000,
            arrows:         true,
            prevArrow:      '<button class="arrow transparent prev"><i class="icon-chevron-left"></button>',
            nextArrow:      '<button class="arrow transparent next"><i class="icon-chevron-right"></button>',
            dots:           true,
            infinite:       false,
            mobileFirst:    true
        }
    );

});
