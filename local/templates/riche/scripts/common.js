'use strict';

// region JS detect

window.addEventListener(
    'load',
    () => {

        document.documentElement.classList.remove('nojs');

    }
);

// endregion

//region прилипчивая шапка сайта

$(() => {

    const header = $('#page--header');

    header.sticky(
        {
            zIndex: 5000
        }
    );

});

//endregion

// region скрываемая панель в шапке  прокрутке

$(() => {

    const headerNav          = $('.nav', '#page--header'),
          scrollResetTimeout = 200;

    let currentScrollTop,
        prevScrollTop = 0,
        scrollTimeout = null;

    $(window).on(
        'scroll',
        () => {

            if (scrollTimeout !== null) {

                clearInterval(scrollTimeout);

            }

            scrollTimeout = setTimeout(
                () => {

                    currentScrollTop = $(window).scrollTop();

                    if (currentScrollTop > prevScrollTop) {

                        headerNav.slideUp();

                    } else {

                        headerNav.slideDown();

                    }

                },
                scrollResetTimeout
            );

            prevScrollTop = currentScrollTop;

        }
    );

});

//endregion

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

// region frame mode debug

BX.ready(
    function () {

        if (window.frameCacheVars !== undefined) {

            BX.addCustomEvent(
                "onFrameDataReceived",
                () => {

                    $(document).trigger('onFrameDataReceived');

                }
            );

        }

    }
);

// endregion
