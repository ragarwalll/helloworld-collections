$(document).ready(function(){
 
    $(window).scroll(function(){
     var position = $(window).scrollTop();
     var bottom = $(document).height() - $(window).height();
   
     if( position == bottom ){
   
      var row = Number($('#row').val());
      var allcount = Number($('#all').val());
      var rowperpage = 5;
      row = row + rowperpage+1;
   
      if(row <= allcount){
       $('#row').val(row);
       $.ajax({
        url: 'ajax_fetch',
        type: 'post',
        data: {row:row},
        success: function(response){
         $(".item:last").after(response).show().fadeIn("slow");
        }
       });
      }
     }
    
    });
    
   });