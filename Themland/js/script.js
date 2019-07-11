// Service Slider
$('.service-for-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: false,
    swipe: false,
    asNavFor: '.service-nav-slider'
  });
  $('.service-nav-slider').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    asNavFor: '.service-for-slider',
    dots: false,
    arrows: false,
    swipe: false,
    centerMode: false,
    focusOnSelect: true
  });


    // testimonial slick part //

    $('.testimonial-slider-box').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      infinite: true,
      arrows: false,
      fade: true,
      asNavFor: '.testimonial-nav-slider',
  });

  $('.testimonial-nav-slider').slick({
      slidesToShow: 3,
      infinite: true,
      slidesToScroll: 1,
      asNavFor: '.testimonial-slider-box',
      dots: false,
      arrows: true,
      prevArrow: '<i class="fa fa fa-chevron-up slidPrv2"></i>',
    nextArrow: '<i class="fa fa-chevron-down slidNext2"></i>',
      vertical: true,
      verticalSwiping: true,
      centerPadding: '0px',
      centerMode: true,
      focusOnSelect: true,
  });

  // Partner Slider 
  
$('.partner-slider').slick({
  centerMode: true,

  slidesToScroll: 1,
  slidesToShow: 5,
  infinite: true,
  autoplay: true,
  centerPadding: '0px',
  arrows: false,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});

