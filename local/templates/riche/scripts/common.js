// region passive listeners

/** @link https://stackoverflow.com/questions/60357083/does-not-use-passive-listeners-to-improve-scrolling-performance-lighthouse-repo **/

jQuery.event.special.touchstart = {
    setup: function (_, ns, handle) {
        this.addEventListener(
            "touchstart",
            handle,
            {
                passive: !ns.includes("noPreventDefault")
            }
        );
    }
};

jQuery.event.special.touchmove = {
    setup: function (_, ns, handle) {
        this.addEventListener(
            "touchmove",
            handle,
            {
                passive: !ns.includes("noPreventDefault")
            }
        );
    }
};

jQuery.event.special.wheel = {
    setup: function (_, ns, handle) {
        this.addEventListener(
            "wheel",
            handle,
            {
                passive: true
            }
        );
    }
};

jQuery.event.special.mousewheel = {
    setup: function (_, ns, handle) {
        this.addEventListener(
            "mousewheel",
            handle,
            {
                passive: true
            }
        );
    }
};

// endregion

// region JS detect

window.addEventListener(
    'load',
    () => {

        document.documentElement.classList.remove('nojs');

    }
);

// endregion

// region header sticky

$(() => {

    const header = $('#page--header');
    const headerNav = $('.nav', header);

    //region прилипчивая шапка сайта

    // header.sticky(
    //     {
    //         zIndex: 5000
    //     }
    // );

    //endregion

    // //region скрывающаяся панель навигации в шапке при прокрутке
    //
    // // @todo вынести в плагин?
    //
    // let scrollStopTimeout  = null,
    //     prevScrollPosition = $(window).scrollTop(),
    //     currentScrollPosition;
    //
    // $(window).on(
    //     'scroll',
    //     () => {
    //
    //         if (scrollStopTimeout) {
    //
    //             clearTimeout(scrollStopTimeout);
    //
    //         }
    //
    //         scrollStopTimeout = setTimeout(
    //             () => {
    //
    //                 currentScrollPosition = $(window).scrollTop();
    //
    //                 if (prevScrollPosition > currentScrollPosition) {
    //                     headerNav.slideDown();
    //                 } else {
    //                     headerNav.slideUp();
    //                 }
    //
    //                 prevScrollPosition = currentScrollPosition;
    //
    //             },
    //             200
    //         );
    //
    //     }
    // );
    //
    // //endregion

});

// endregion

// region кнопка с индикатором прогресса

$(document).on(
    'click',
    'button.progress',
    (event) => {

        const throbber = 'throbber';

        let button = $(event.currentTarget),
            icon   = $('i[class^="icon"]', button);

        $(document).on(
            {
                ajaxStart:    () => {

                    icon.addClass(throbber);

                },
                ajaxComplete: () => {

                    icon.removeClass(throbber);

                }
            }
        );

    }
);

// endregion
