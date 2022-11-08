$(() => {

    const features = $('.features--front'),
          expanded = 'expanded';

    let items = $('.item', features);

    items.on(
        'click',
        (event) => {

            let item = $(event.currentTarget);

            items.removeClass(expanded);
            item.addClass(expanded);


        }
    );

});
