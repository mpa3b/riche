// region lazyload

window.addEventListener(
    "load",
    () => {

        const lazyImage       = new LazyLoad(
                {
                    elements_selector: "img.lazy"
                }
            ),
            lazyImageNative = new LazyLoad(
                {
                    elements_selector: "img[loading=lazy]",
                    use_native       : true
                }
            );

    }
);

// endregion