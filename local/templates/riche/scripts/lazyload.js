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

        $(document).on(
            'ajaxComplete',
            () => {

                lazyImage.update();
                lazyImageNative.update();
                lazyVideo.update();

            }
        );

    }
);

// endregion
