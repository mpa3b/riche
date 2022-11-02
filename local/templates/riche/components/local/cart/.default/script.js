$(() => {

    const element   = $('.cart--default'),
          component = element.data('component');

    let items = $.bxAjax(component);

    $('ul.items', element).render(items);

    console.debug(items);

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
