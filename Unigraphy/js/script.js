

// fIXED MENU AND bACK TO TOP BUTTON
   //fixed menu
   var bc2top = $(".back-to-top");
   var $sticky = $(".menu");
   var $nav_logo = $(".unigraphy-header-logo");
   var $top_btn = $(".top-btn");


  //  Fixed menu 
  $(window).on('scroll' , function(){
    var $scrolling = $(this).scrollTop();
   
    if($scrolling > 130){
      $sticky.addClass("nav-bg");
      $nav_logo.addClass("unigraphy-header-logo-small");
      
      if($scrolling > 1000){
        $top_btn.addClass("top-btn-opacity");
      }
      
    }
    else{
      $sticky.removeClass("nav-bg");
      $nav_logo.removeClass("unigraphy-header-logo-small");
      $top_btn.removeClass("top-btn-opacity");
    }
  });



// ==============================
$('.service-slider-container').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay:true,
    dots:false,
    autoplaySpeed:3000,
    prevArrow:'<i class="fas fa-arrow-left service-slider-btn-left"></i>',
    nextArrow:'<i class="fas fa-arrow-right service-slider-btn-right"></i>',
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        dots:false,
        slidesToScroll: 2,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 992,
      settings: {
        dots:false,
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 700,
      settings: {
        dots:false,
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]

  });
//Design Slider Start 
  $('.design-container').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay:true,
    dots:false,
    autoplaySpeed:2500,
    prevArrow:false,
    nextArrow:false,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          dots:false,
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 768,
        settings: {
          dots:false,
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 420,
        settings: {
          dots:false,
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


// Cliens section
$('.client-slider').slick({
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay:true,
  dots:true,
  prevArrow:false,
  nextArrow:false,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 992,
      settings: {
        dots:true,
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 768,
      settings: {
        dots:true,
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 575,
      settings: {
        dots:true,
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

// Counter Slider
$('.counter-client-logo').slick({
  infinite: true,
  slidesToShow: 5,
  slidesToScroll: 1,
  autoplay: true,
  prevArrow:false,
  nextArrow:false,
  dots:false,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
        dots:false,
        prevArrow:false,
        nextArrow:false,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        dots:false,
        prevArrow:false,
        nextArrow:false,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 574,
      settings: {
        slidesToShow: 2,
        dots:false,
        prevArrow:false,
        nextArrow:false,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 400,
      settings: {
        slidesToShow: 1,
        dots:false,
        prevArrow:false,
        nextArrow:false,
        slidesToScroll: 1
      }
    }
  
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

// VenuBox Initilize Code
$(document).ready(function(){
  $('.venobox').venobox(); 
});

