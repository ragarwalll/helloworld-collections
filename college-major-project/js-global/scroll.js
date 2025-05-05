var data;
$(document).ready(function() {
    $(".index a").click(function() {
        //Do stuff when clicked      
        data= $(this).attr("data");
        $('html,body').animate({
            scrollTop: $("."+data).offset().top},
            'slow');
    }); 
});
