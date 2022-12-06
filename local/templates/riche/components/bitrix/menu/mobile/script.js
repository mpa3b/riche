$(() => {

    const button = $('button.trigger');

    const menu = $('.menu--mobile');

    button.on(
        'click',
        () => {

            menu.slideToggle();

        }
    );

    $(window).on(
        'scroll',
        () => {

            menu.slideUp();

        }
    );

});
