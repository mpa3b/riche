$(() => {

    const element = $('.catalog--default--element--default');

    const elementId = element.data('id'), // вероятно это -- ТП, если есть, или товар.
          parentId  = element.data('id'), // вероятно, это родитель комплексного товара.
          siteId    = element.data('site');

    // region сообщение о просмотре товара в API модуля каталога

    $.ajax(
        {
            url:    '/bitrix/components/bitrix/catalog.element/ajax.php',
            method: 'POST',
            data:   {
                AJAX:       'Y',
                SITE_ID:    siteId,
                PRODUCT_ID: elementId,
                PARENT_ID:  parentId
            }
        }
    );

    // endregion

    // region основной слайдер

    const elementImages = $('.images', element);
    const elementImagesSlider = $('.slider', elementImages);

    elementImagesSlider
        .slick(
            {
                slidesToShow:   1,
                slidesToScroll: 1,
                fade:           true,
                speed:          500,
                autoplay:       false,
                autoplaySpeed:  3000,
                arrows:         false,
                dots:           true,
                infinite:       true
            }
        )
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

    $('button.prev', elementImages).on(
        'click',
        () => {

            elementImagesSlider.slick('slickPrev');

        }
    );

    $('button.next', elementImages).on(
        'click',
        () => {

            elementImagesSlider.slick('slickNext');

        }
    );

    // endregion

    // region слайдеры инструкции

    const elementHowTo = $('.how-to-use', element);

    const elementHowToInstructionSlider = $('.how-to-use--instruction .slider', elementHowTo),
          elementHowToImagesSlider      = $('.how-to-use--images .slider', elementHowTo);

    elementHowToInstructionSlider.slick(
        {
            slidesToShow:   1,
            slidesToScroll: 1,
            arrows:         false,
            fade:           true,
            dots:           true,
            autoplay:       false,
            infinite:       false,
            asNavFor:       elementHowToImagesSlider,
        }
    );

    elementHowToImagesSlider.slick(
        {
            slidesToShow:   1,
            slidesToScroll: 1,
            arrows:         false,
            fade:           true,
            autoplay:       false,
            infinite:       false,
            asNavFor:       elementHowToInstructionSlider,
        }
    );

    // endregion

});
