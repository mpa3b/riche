$(() => {

    const element = $('.quiz-front--new');

    const quizSlider = $('.fields', element);

    quizSlider.slick(
        {
            slidesToShow:   1,
            slidesToScroll: 1,
            fade:           true,
            speed:          500,
            autoplay:       false,
            arrows:         true,
            prevArrow:      $('button.prev', element),
            nextArrow:      $('button.next', element),
            // prevArrow:      '<button class="arrow transparent prev" type="button"><i class="icon-chevron-left"></button>',
            // nextArrow:      '<button class="arrow transparent next" type="button"><i class="icon-chevron-right"></button>',
            dots:           false,
            infinite:       false,
            mobileFirst:    true
        }
    );

});
