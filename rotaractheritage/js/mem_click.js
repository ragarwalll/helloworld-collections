$('form').on('submit',function(e){
    e.preventDefault();
    $.ajax({
        type     : "POST",
        cache    : false,
        url      : $(this).attr('action'),
        success  : function(data) {
              
        }
    });
    var str1=$(this).html().replace(/\s/g,'');
    var y ="<inputtype=\"submit\"name=\"paid\"value=\"✔\"class=\"paid\">";
    var n ="<inputtype=\"submit\"name=\"unpaid\"value=\"✘\"class=\"unpaid\">";  
    if(str1 == n){
        $(this).html("<input type='submit' name='unpaid' value='✔' class='paid'>");
    }
    else{
        $(this).html("<input type='submit' name='unpaid' value='✘' class='unpaid'>");
    }
    

}); 