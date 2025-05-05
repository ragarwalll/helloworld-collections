$(".top-scroll").hide();
$(document).ready(function() {
    $(".top-scroll").click(function() {
        $('html,body').animate({
            scrollTop: $(".container").offset().top},
        'slow');
    });
});
var height=$(window).height();
window.addEventListener('scroll', function(e) {
 var userScroll=$(window).scrollTop();
 if(userScroll > height){
     $(".top-scroll").fadeIn();
 }
 if(height > userScroll){
    $(".top-scroll").fadeOut();
 }
});