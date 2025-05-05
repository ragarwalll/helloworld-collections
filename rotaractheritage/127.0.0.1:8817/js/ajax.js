function checkit(){
    var usernameResponse;
    var usernameCheck = document.querySelector(".user").value;
    console.log(usernameCheck);
    if(usernameCheck)
    {
      $.ajax({
        type: 'POST',
        url: 'checkusername',
        data: {
          usernameTrue: usernameCheck,
        },
          success: function (data) {
            $( '#email_status' ).html(data);  
            if(data == "OK")
            {
              
            }
            else
            {
              return false;
            }
  
          }
      });
    }
    else{
      $( '#email_status' ).html("");
      return false;
    }
  }