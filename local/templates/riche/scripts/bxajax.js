// region bxAjax

// @todo надо переделать на синтаксис, близкий к jQuery.ajax();

$.extend(
    {
        bxAjax: (component, data) => {

            const entrypoint = '/bitrix/services/main/ajax.php';

            let parameters = {
                c     : data.component,
                action: data.action,
                mode  : 'class'
            };

            const url = entrypoint + '?' + $.param(parameters, true);

            let method;

            if (!this.data.method) {
                method = 'GET';
            } else {
                method = data.method.toUpperCase();
            }

            delete data.action;
            delete data.method;

            if (sessid) {
                data.sessid = this.sessid;
            }

            let result;

            $.ajax(
                url,
                {
                    data   : data,
                    method : method,
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
