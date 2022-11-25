$(() => {

    const articlesFront = $('.articles--front');

    const articlesFrontSlider       = $('.slider', articlesFront),
          articlesFrontSliderParams = {
              slidesToShow:   2,
              slidesToScroll: 1,
              fade:           false,
              speed:          1000,
              autoplay:       false,
              autoplaySpeed:  5000,
              arrows:         false,
              dots:           false,
              infinite:       false,
              mobileFirst:    true,
              responsive:     [
                  {
                      breakpoint: breakpoint.mobile,
                      settings:   {
                          slidesToShow: 3
                      }
                  },
                  {
                      breakpoint: breakpoint.desktop,
                      settings:   {
                          slidesToShow: 4
                      }
                  },
              ]
          };

    articlesFrontSlider.slick(articlesFrontSliderParams);

});
