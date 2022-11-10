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

// region scroll

$(window).on(
    'scroll',
    () => {



    }
);

// endregion

// region кнопка с индикатором прогресса

$(document).on(
    'click',
    'button.progress',
    (event) => {

        const throbber = 'throbber';

        let button = $(event.currentTarget),
            icon   = $('.icon', button);

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
