$(window).on('ready', function() {
         
     $(".center").slick({

     dots: false,
     lazyLoad: 'ondemand',
     infinite: false,
     centerMode: true,
     slidesToShow: 2,
     slidesToScroll: 1,
     arrows: false,
     autoplay: true,
     autoplaySpeed: 1500,

     responsive: [{

     breakpoint: 1024,
     settings: {
          slidesToShow: 2,
          infinite: true
     }

}, {

     breakpoint: 600,
     settings: {
          slidesToShow: 1,
          dots: true
     }

}, {

     breakpoint: 300,
     settings: "unslick" //destroy slick

}]

});

});