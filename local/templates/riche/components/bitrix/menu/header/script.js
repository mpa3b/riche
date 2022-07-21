'use strict';

$(() => {

    const element = $('#menu--header');
    const button = $('button.trigger', element);
    const menu = $('.wrapper', element);
    const markerClass = 'in-view';

    button.on(
        'click',
        () => {

            menu.toggleClass(markerClass);

        }
    );

});