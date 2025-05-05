<?php
include ('./inc/connect.inc.php');
if(isset($_POST['resetpassword']))
{
  $email=$_POST['email'];
  $cstrong=TRUE;
  $token=bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
  $user_id=DB::query('SELECT id FROM users WHERE email=:email', array(':email'=>$email))[0]['id'];
  DB::query('INSERT INTO password_tokens VALUES(\'\',:token, :user_id)', array(':token'=>sha1($token),':user_id'=>$user_id));
  echo "Email Send!";
  echo "<br />";
  echo $token;
}
?>
<h1>forgot password?</h1>
<form action="forgot_password.php" method="post">
 <input type="text" name="email" value="" placeholder="Email"><br />
 <input type="submit" name="resetpassword" value="Reset Password">
</form>
