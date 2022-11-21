$(() => {

    const quiz = $('.quiz-front--new');

    const quizSlider = $('.fields', quiz);

    quizSlider.slick(
        {
            slidesToShow:   1,
            slidesToScroll: 1,
            fade:           true,
            speed:          500,
            autoplay:       false,
            arrows:         false,
            dots:           false,
            infinite:       false,
            mobileFirst:    true
        }
    );

    $('button.start', quizSlider).on(
        'click',
        (event) => {

            event.preventDefault();

            quizSlider.slick('slickNext');

        }
    );

    $('button.next', quizSlider).on(
        'click',
        (slick, currentSlide) => {

            quizSlider.slick('slickNext');

        }
    );

    const progress = $('.progress', quiz);
    const progressBar = $('.progress--bar', progress);
    const progressValue = $('.progress--value', progress);

    $('.field', quizSlider).on(
        'change',
        (event) => {

            let container  = $(event.currentTarget),
                nextButton = $('button.next', container);

            nextButton.removeAttr('disabled');

        }
    );

    quizSlider.on(
        {
            init:        () => {

                progressBar.fadeIn();
                progressBar.width(100 / quizSlider.length + '%');

            },
            afterChange: (slick, currentSlide) => {

                progressBar.width(100 / currentSlide.slideCount * currentSlide.currentSlide + '%');
                progressValue.text(currentSlide.currentSlide + '/' + currentSlide.slideCount);

            }
        }
    );

});
