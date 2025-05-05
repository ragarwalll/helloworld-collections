<?php
include ('./inc/connect.inc.php');
include ('./checkcookie.php');
$tokeIsValid= False;
if (Login::isloggedIn())
{
  if(isset($_POST['changepassword']))
  {
    $oldpassword=$_POST['oldpassword'];
    $newpassword=$_POST['newpassword'];
    $newpasswordrepeat=$_POST['newpasswordrepeat'];
    $userid=Login::isloggedIn();
    if (password_verify($oldpassword, DB::query('SELECT password FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['password']))
    {
      if($newpassword == $newpasswordrepeat)
      {
        if(strlen($newpassword) >=6 && strlen($newpassword) <=60)
        {
          DB::query('UPDATE users SET password=:password WHERE id=:userid', array(':password'=>password_hash($newpassword, PASSWORD_BCRYPT), ':userid'=>$userid));
          echo "Password chaged successfully";
        }
        else
        {
            echo "Your password must be between 6 and 60 characters long";
        }

      }
      else
      {
        echo "New password doesn't match";
      }

    }
    else
    {
      echo "Incorrect old Password";
    }
  }
}
else
{

  if(isset($_GET['token']))
  {
    $token=$_GET['token'];
    if (DB::query('SELECT user_id FROM password_tokens WHERE token=:token', array(':token'=>sha1($token))))
    {
      $userid=DB::query('SELECT user_id FROM password_tokens WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'] ;
      $tokeIsValid= True;
      if(isset($_POST['changepassword']))
      {
        $newpassword=$_POST['newpassword'];
        $newpasswordrepeat=$_POST['newpasswordrepeat'];
        if($newpassword == $newpasswordrepeat)
        {
          if(strlen($newpassword) >=6 && strlen($newpassword) <=60)
          {
            DB::query('UPDATE users SET password=:password WHERE id=:userid', array(':password'=>password_hash($newpassword, PASSWORD_BCRYPT), ':userid'=>$userid));
            echo "Password chaged successfully";
            DB::query('DELETE FROM password_tokens WHERE user_id=:userid', array(':userid'=>$userid));
          }
          else
          {
              echo "Your password must be between 6 and 60 characters long";
          }
        }
        else
        {
          echo "New password doesn't match";
        }
      }
    }
    else
    {
      die('Token Invalid or Expired');
    }
  }
  else
  {
    die('Not logged in');
  }
}
?>
<h1>Change your Password</h1>
<form action=<?php if(!$tokeIsValid){ echo 'change_password.php';} else{ echo 'change_password.php?token='.$token.''; }?> method="post">
  <?php if(!$tokeIsValid){ echo '<input type="password" name="oldpassword" value="" placeholder="Current Password"><br />'; } ?>
  <input type="password" name="newpassword" value="" placeholder="New Password"><br />
  <input type="password" name="newpasswordrepeat" value="" placeholder="Retype New Password"><br />
  <input type="submit" name="changepassword" value="Change Password">
</form>
