// region отметить просмотр товара

$.extend(
    {
        reportCatalogElementViewed: (siteId, productId, parentId) => {

            $.ajax(
                {
                    url:    '/bitrix/components/bitrix/catalog.element/ajax.php',
                    method: 'POST',
                    data:   {
                        AJAX:       'Y',
                        SITE_ID:    siteId,
                        PRODUCT_ID: productId,
                        PARENT_ID:  parentId
                    }
                }
            );

        }
    }
);


// endregion
