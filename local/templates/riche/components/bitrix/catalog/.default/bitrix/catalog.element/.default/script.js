$(() => {

    const element = $('.catalog--default--element--default');

    const elementId = element.data('id'),
          parentId  = element.data('section'),
          siteId    = element.data('site');

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
        );

});
