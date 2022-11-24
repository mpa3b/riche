// region Bitrix AJAX

// @todo переделать на синтаксис, близкий к jQuery.ajax();

const bxAjaxRequestUrl = (component, action) => {

    let query = {
        c:      component,
        action: action,
        mode:   'class'
    };

    return '/bitrix/services/main/ajax.php?' + $.param(query, true);

}

// endregion

$.extend(
    {
        bxajax: (data) => {

            let query = {
                c:      data.component,
                action: data.action,
                mode:   'class'
            };

            data.sessid = sessid;

            let request = $.ajax(
                {
                    url:  '/bitrix/services/main/ajax.php?' + $.param(query, true),
                    data: data
                }
            );

            request.done(
                (response) => {
                    console.log(response);
                }
            );

        }
    }
);
