$(document).on(
    'click',
    'button.progress',
    (event) => {

        const throbber = 'throbber';

        let button = $(event.currentTarget),
            icon   = $('.icon', button);

        $(document).on(
            {
                ajaxStart :    () => {

                    icon.addClass(throbber);

                },
                ajaxComplete : () => {

                    icon.removeClass(throbber);

                }
            }
        );

    }
);

// region bxAjax

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

            result = {
                1 : {
                    id :             1,
                    name :           'Test 1',
                    picture :        {
                        mobile :  '/upload/images/1-mobile.png',
                        desktop : '/upload/images/1-desktop.png'
                    },
                    base_price :     1000,
                    discount_price : 800,
                    quantity :       2,
                    total :          1600
                },
                2 : {
                    id :             2,
                    name :           'Test 2',
                    picture :        {
                        mobile :  '/upload/images/2-mobile.png',
                        desktop : '/upload/images/2-desktop.png'
                    },
                    base_price :     1200,
                    discount_price : 900,
                    quantity :       3,
                    total :          2700
                },
                3 : {
                    id :             3,
                    name :           'Test 3',
                    picture :        {
                        mobile :  '/upload/images/3-mobile.png',
                        desktop : '/upload/images/3-desktop.png'
                    },
                    base_price :     700,
                    discount_price : 500,
                    quantity :       1,
                    total :          500
                }
            };

            return result;

        }
    }
);

// endregion

// region templating

$.extend(
    {
        render : (container, data) => {

            let template = $('template', container).innerHTML();

            data.each(
                (index, element) => {



                }
            );

        }
    }
);

// endregion
