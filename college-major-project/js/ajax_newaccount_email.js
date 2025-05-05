function checkitemail(){
    var usernameResponse;
    var emailCheck = document.querySelector(".usercheckemail").value;
    
    if(emailCheck)
    {
      $.ajax({
        type: 'POST',
        url: 'checkemail_new.php',
        data: {
          emailTrue: emailCheck,
        },
          success: function (data) {
            $( '#email_check' ).html(data);  
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
      $( '#email_check' ).html("");
      return false;
    }
  }