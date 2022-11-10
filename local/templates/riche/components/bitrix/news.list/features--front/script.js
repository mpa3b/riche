$(() => {

    const features = $('.features--front'),
          expanded = 'expanded';

    let items = $('.item', features);

    items.on(
        'click',
        (event) => {

            items.removeClass(expanded).find('video').trigger('pause');

            let item = $(event.currentTarget);

            item.addClass(expanded).find('video').trigger('play');

        }
    );

});
