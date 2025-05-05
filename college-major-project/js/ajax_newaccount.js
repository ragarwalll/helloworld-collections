function checkit(){
    var usernameResponse;
    var usernameCheck = document.querySelector(".usercheck").value;
    
    if(usernameCheck)
    {
      $.ajax({
        type: 'POST',
        url: 'checkusername_new.php',
        data: {
          usernameTrue: usernameCheck,
        },
          success: function (data) {
            $( '#user_check' ).html(data);  
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
      $( '#user_check' ).html("");
      return false;
    }
  }