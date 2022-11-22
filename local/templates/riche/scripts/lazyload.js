// region lazyload

'use strict';

window.addEventListener(
    'load',
    () => {

        let lazyImage       = new LazyLoad(
                {
                    elements_selector: 'img.lazy'
                }
            ),
            lazyImageNative = new LazyLoad(
                {
                    elements_selector: 'img[loading]',
                    use_native:        true
                }
            ),
            lazyVideo       = new LazyLoad(
                {
                    elements_selector: 'video',
                    use_native:        true
                }
            );

        const updateLazies = () => {

            lazyImage.update();
            lazyImageNative.update();
            lazyVideo.update();

        }

        $(document).on(
            'ajaxComplete',
            () => {

                updateLazies();

            }
        );

        if (typeof BX !== "undefined") {

            BX.ready(
                () => {

                    updateLazies();

                }
            );

            if (window.frameCacheVars !== undefined) {

                BX.addCustomEvent(
                    "onFrameDataReceived",
                    () => {
                        updateLazies();
                    }
                );

            }

        }

    }
);

// endregion
