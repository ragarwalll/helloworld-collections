$(document).ready(function(){
  
    $(window).scroll(function(){
     var position = $(window).scrollTop();
     var bottom = $(document).height() - $(window).height();
   
     if( position == bottom){
   
      var row = Number($('#row_posts').val());
      var allcount = Number($('#all_posts').val());
      var rowperpage = 5;
      var reset = 25;
      row = row + rowperpage;
      if(row > allcount){
        row = 0;
        document.getElementById("row_posts").value = row;
      }
        console.log(row);
        if(working == false){
          if(row <= allcount){
          $('#row').val(row);
          $.ajax({
            url: './posts',
            type: 'post',
            data: {row:row},
            success: function(response){
                document.querySelector('.profile--wrapper').insertAdjacentHTML('beforeend', response); 
                document.getElementById("row_posts").value = row;
                setTimeout(function() {
                  working = false;
                  }, 4000)
          } 
        });
        }
      }
     }
    
    });
    
   });
