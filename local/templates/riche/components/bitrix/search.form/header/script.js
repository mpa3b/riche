$(() => {

    const element = $('.header-search');
    const button = $('button.trigger', element);

    button.on(
        'click',
        () => {

            $.colorbox(
                {
                    href: $('.header-search--popup'),
                    inline: true,
                }
            );

        }
    );

});