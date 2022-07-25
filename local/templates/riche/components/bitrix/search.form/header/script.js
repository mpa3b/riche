$(() => {

    const element = $('.header-search');
    const button = $('button.trigger', element);

    const searchForm = $('.header-search--form', element);

    button.on(
        'click',
        () => {

            searchForm.fadeIn(
                () => {

                    $('input[type="search"]', searchForm).focus();

                    $(document).on(
                        'click',
                        (event) => {

                            let $target = $(event.target);

                            if (!$target.closest(element).length && searchForm.is(":visible")) {

                                searchForm.fadeOut();

                            }

                        }
                    );

                }
            );

        }
    );

});