$(() => {

    const element   = $('.cart--default'),
          component = 'riche:cart';

    $(document).on(
        'click',
        '.cart--default button[data-action]',
        (event) => {

            event.preventDefault();

            let data = $(event.target).data();

            $.bxAjax(component, data);

        }
    );

});
