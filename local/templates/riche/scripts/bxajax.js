// region bxAjax

// @todo надо переделать на синтаксис, близкий к jQuery.ajax();

$.extend(
    {
        bxajax: (component, action, data, method = false) => {

            this.data = data;

            this.entrypoint = '/bitrix/services/main/ajax.php';

            this.parameters = {
                c     : this.data.component,
                action: this.data.action,
                mode  : 'class'
            };

            this.url = this.entrypoint + '?' + $.param(this.parameters, true);

            if (!method) {
                this.method = 'GET';
            } else {
                this.method = method.toUpperCase();
            }

            delete this.data.action;
            delete this.data.method;

            if (sessid) {
                this.data.sessid = this.sessid;
            }

            $.ajax(
                this.url,
                {
                    data   : this.data,
                    method : this.method,
                    success: (response) => {

                        this.result = response;

                    }
                }
            );

            return this.result;

        }
    }
);

// endregion
