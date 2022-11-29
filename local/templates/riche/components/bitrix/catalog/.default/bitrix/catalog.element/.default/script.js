$(() => {

    let element   = $('.catalog--default--element--default'),
        elementId = element.data('id'),
        parentId  = element.data('section'),
        siteId    = element.data('site');

    $.ajax(
        {
            url:     '/bitrix/components/bitrix/catalog.element/ajax.php',
            method:  'POST',
            data:    {
                AJAX:       'Y',
                SITE_ID:    siteId,
                PRODUCT_ID: elementId,
                PARENT_ID:  parentId
            }
        }
    );

});
