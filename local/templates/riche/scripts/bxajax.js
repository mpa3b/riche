// region bxAjax

// @todo надо переделать на синтаксис, близкий к jQuery.ajax();

const bxAjaxRequestUrl = (component, action) => {

    let query = {
        c:      component,
        action: action,
        mode:   'class'
    };

    return '/bitrix/services/main/ajax.php?' + $.param(query, true);

}

// endregion
