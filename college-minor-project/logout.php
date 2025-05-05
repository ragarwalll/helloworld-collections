<?php
include ( "./inc/header.inc.php");
if(!$userid){
    die("You must be logged in to vew this page");
}

if(isset($_POST['confirm']))
{
  if(isset($_POST['alldevices']))
  {
    DB::query('DELETE FROM login_tokens WHERE user_id=:userid', array(':userid'=>Login::isloggedIn()));
  }
  else {
    if(isset($_COOKIE['SNID']))
    {
      DB::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])));
    }
    setcookie('SNID', 1, time()-3600);
    setcookie('SNID_', 1, time()-3600);
  }
  header("Location: index.php");
}
 ?><br><br><br>
<div class="profile--wrapper">
<h1 style="margin:0px">Logout of your account?</h1><hr><br>
 <p>Are you sure you'd like to logout?</p>
<form action="logout.php" method="post">
  <input type="checkbox" name="alldevices" value="alldevices">Logout of all devices?<br />
  <input type="submit" name="confirm" value="Confirm" class="contact__final">
</form>
</div>
