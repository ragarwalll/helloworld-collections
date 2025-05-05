<?php
if(isset($_POST['reg']))
{
  $fn= $_POST['fname'];
  $ln= $_POST['lname'];
  $un= $_POST['username'];
  $em= $_POST['email'];
  $em2= $_POST['email2'];
  $pswd= $_POST['password'];
  $pswd2= $_POST['password2'];
  $d= date("Y-m-d");

  if($fn&&$ln&&$un&&$em&&$em2&&$pswd&&$pswd2)
  {
    if(!DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$em)))
    {
      if(filter_var($em, FILTER_VALIDATE_EMAIL))
      {
        if($em==$em2)
        {
          if(!DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$un)))
          {
            if(strlen($un) >=3 && strlen($un) <=32)
            {
              if(preg_match('/[a-zA-Z0-9_]+/', $un))
              {
                if($pswd == $pswd2)
                {
                  if(strlen($pswd)>60||strlen($pswd)<6)
                  {
                    echo "Your password must be between 6 and 30 characters long";
                  }
                  else
                  {
                    DB::query('INSERT INTO users VALUES(\'\',:username, :first_name, :last_name, :email, :password, :sign_up_date, \'0\')', array(':username'=>$un,':first_name'=>$fn,':last_name'=>$ln,':email'=>$em,':password'=>password_hash($pswd, PASSWORD_BCRYPT),':sign_up_date'=>$d));
                    die("<h2>Welcome to El Arte Connect</h2>Login in to get started");
                  }
                }
                else
                {
                  echo "Password does not match";
                }
              }
              else
              {
                  echo "Use only special characters like _ , @ for username";
              }
            }
            else
            {
                echo "Username must be between 3 to 32 characters";
            }
          }
          else
          {
            echo "Username already exists";
          }
        }
        else
        {
          echo "Email does not match";
        }
      }
      else
      {
        echo "Invalid Email";
      }
    }
    else
    {
      echo "Email already exists";
    }
  }
  else
  {
    echo "Please fill every detail then proceed";
  }
}
?>
