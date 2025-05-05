var working = false;
$('.profile--wrapper').on('submit','.post--like-unlike',function(e){
    e.preventDefault();
    if(working == false){
        working = true;
        
        $.ajax({
            type     : "POST",
            cache    : false,
            url      : $(this).attr('action'),
            success  : function(data) {
            }
        });
        var str1=$(this).html().replace(/\s/g,'');
        var y ="<inputtype=\"submit\"value=\"Like\"class=\"post-like-form\">";
        var n ="<inputtype=\"submit\"value=\"Unlike\"class=\"post-like-form\">"; 
        
        if(str1 == n){
            $(this).html("<input type='submit' value='Like' class='post-like-form'>");
            var likes = $(this).parent().parent().prev().prev().prev().html().replace(/\s/g,'');
            likes = parseInt(likes, 10)
            var likes = likes - 1;
            $(this).parent().parent().prev().prev().prev().html(likes);
        }
        else{
            $(this).html("<input type='submit' value='Unlike' class='post-like-form'>");
            var likes = $(this).parent().parent().prev().prev().prev().html().replace(/\s/g,'');
            likes = parseInt(likes, 10)
            var likes = likes + 1;
            $(this).parent().parent().prev().prev().prev().html(likes);

        }
        setTimeout(function() {
            working = false;
            }, 500)
    }
}); 