$(() => {

    const features = $('.features--front'),
          expanded = 'expanded';

    let items = $('.item', features);

    items.on(
        'click',
        (event) => {

            let item = $(event.currentTarget);

            items.removeClass(expanded);
            $('video', items).trigger('pause');

            item.addClass(expanded);
            $('video', items).trigger('play');


        }
    );

});
