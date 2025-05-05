<?php
if(isset($_POST['login']))
{
  $un=$_POST['user_login'];
  $pswd=$_POST['password_login'];
  if(DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$un)))
  {
    if (password_verify($pswd, DB::query('SELECT password FROM users WHERE username=:username', array(':username'=>$un))[0]['password']))
    {
      $cstrong=TRUE;
      $token=bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
      $user_id=DB::query('SELECT id FROM users WHERE username=:username', array(':username'=>$un))[0]['id'];
      DB::query('INSERT INTO login_tokens VALUES(\'\',:token, :user_id)', array(':token'=>sha1($token),':user_id'=>$user_id));
      setcookie("SNID", $token, time() + 60 * 60 * 24 * 7,'/', NULL, NULL, TRUE);
      setcookie("SNID_", 1, time() + 60 * 60 * 24 * 3,'/', NULL, NULL, TRUE);
      header("location: home.php");
    }
    else
    {
        echo "Incorred Password";
    }

  }
  else
  {
    echo "User not registered";
  }
}
 ?>
