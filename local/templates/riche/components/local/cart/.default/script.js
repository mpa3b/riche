$(() => {

    const element   = $('.cart--default');

    let items = $.bxAjax(element.data('component')),
        container = $('ul.items', element);

    console.debug(items);

    container.renderTemplate(items);

    $(document).on(
        'click',
        '.cart--default button[data-action]',
        (event) => {

            event.preventDefault();

            let data = $(event.target).data();

        }
    );


});
