// Testimonial Slider 

$('.testimonial-slider').slick({
    dots: true,
    infinite: true,
    autoplay:true,
    autoplaySpeed:4000,
    speed: 600,
    slidesToShow: 1,
    dots:true,
    
    prevArrow: '<i class="fas fa-angle-left prevarrow"></i>',
    nextArrow: '<i class="fas fa-angle-right nextarrow"></i>',
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });


  // Contact Detail Slider
$('.contact-detail').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay:false,
    dots:false,
    autoplaySpeed:3000,
    prevArrow:'<i class="fas fa-chevron-left contact-slider-btn-left"></i>',
    nextArrow:'<i class="fas fa-chevron-right contact-slider-btn-right"></i>',
  
  });
