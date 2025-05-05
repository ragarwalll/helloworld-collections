function checkit(){
    var usernameResponse;
    var usernameCheck = document.querySelector(".user").value;
    if(usernameCheck)
    {
      $.ajax({
        type: 'POST',
        url: 'checkusername.php',
        data: {
          usernameTrue: usernameCheck,
        },
          success: function (data) {
            $( '#email_status' ).html(data);  
            if(data == "OK")
            {
              alert("Hi");
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