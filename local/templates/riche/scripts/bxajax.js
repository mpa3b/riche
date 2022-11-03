// region bxAjax

// @todo надо переделать на синтаксис, близкий к jQuery.ajax();

$.extend(
    {
        bxAjax : (component, data, method = 'GET') => {

            if (!data) {
                data = {};
            }

            if (!data.sessid) {
                data.sessid = sessid;
            }

            if (!data.action) {
                data.action = 'get';
            }

            const url   = '/bitrix/services/main/ajax.php',
                  query = {
                      c :      component,
                      action : data.action,
                      mode :   'class'
                  };

            const params = $.param(query, true);

            delete data.action;
            delete data.sessid;

            let request = $.ajax(
                    url + '?' + params,
                    {
                        method : method,
                        cache :  false,
                        data :   data
                    }
                ),
                result;

            request.done(
                (response) => {

                    result = response;

                }
            );

            return result;

        }
    }
);

// endregion

// region templating

// @todo по-моему тут проще отказаться от самописного рендера в пользу vue, underscore или moustache

$.fn.extend(
    {
        renderTemplate : function (data) {

            console.debug(data);

            const container = $(this);
            const template = container.data('template-name');
            const element = $('template[data-template-name="' + template + '"]', container).clone();

//            forEach(
//                data,
//                (_, item) => {
//
//                    forEach(
//                        item,
//                        (name, value) => {
//
//                            $('[data-name=' + name + ']', item).text(value);
//
//                        }
//                    );
//
//                    container.append(element);
//
//                }
//            );

        }
    }
);

// endregion
