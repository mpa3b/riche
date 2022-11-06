// region bxAjax

// @todo надо переделать на синтаксис, близкий к jQuery.ajax();

$.extend(
    {
        /**
         * Запрос к Bitrix AJAX API компонентов.
         *
         * @param component
         * @param action
         * @param data
         * @param method
         *
         * @returns result
         */
        bxajax: (component, action, data, method = 'GET') => {

            const entrypoint = '/bitrix/services/main/ajax.php',
                  parameters = {
                      c:      data.component,
                      action: data.action,
                      mode:   'class'
                  };

            const url = entrypoint + '?' + $.param(parameters, true);

            method = method.toUpperCase();

            delete data.action;
            delete data.method;

            if (sessid) {
                data.sessid = sessid;
            }

            let result;

            $.ajax(
                url,
                {
                    data:    data,
                    method:  method,
                    success: (response) => {

                        result = response;

                    }
                }
            );

            return result;

        }
    }
);

// endregion
