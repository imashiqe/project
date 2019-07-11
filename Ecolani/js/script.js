

// Home Page Banner 
$('.home-slider').slick({
    dots: true,
    infinite: true,
    speed: 1200,
    autoplay: true,
    cssEase: 'ease-out',
    prevArrow: '<i class="fas fa-arrow-left prevarrow"></i>',
    nextArrow: '<i class="fas fa-arrow-right nextarrow"></i>',
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 576,
        settings: {
          speed: 300,
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

// scrollspy
  $('body').scrollspy({ target: '#list-category' })


    /* 01. PreLoader Init
    ============================ */
    function preLoader() {
        setTimeout(function () {
            $('#preloader .scroll-static').addClass('loaded');
            setTimeout(function () {
                $('#preloader').addClass('loaded');
                setTimeout(function () {
                    $('#preloader').remove();
                }, 400);
                
                /* Splitting js init
                ============================ */
                Splitting();

            }, 600);
        }, 1000);
    };
    preLoader();
 