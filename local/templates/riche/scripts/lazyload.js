// region lazyload

window.addEventListener(
    "load",
    () => {

        let lazyImage       = new LazyLoad(
                {
                    elements_selector : "img.lazy"
                }
            ),
            lazyImageNative = new LazyLoad(
                {
                    elements_selector : "img[loading=lazy]",
                    use_native :        true
                }
            );

    }
);

// endregion
