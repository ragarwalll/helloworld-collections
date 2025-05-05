<?php $carousel="no";
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
  header("Location: index");
}
include ( "./inc/header-logged.inc.php");?><br><br><br>

<div class="form">
      <h3 id="area">Rotaract</h3>
      <h2 id="log">Logout?<br></h2>

        <h2 id="new-details">of your Rotaract account</h2>
        <div class="input">
          <div class="email">
            <form action="" method="POST">
              <div class="username" style="text-align:center"><br><br>
              <p style="font-size:19px">Are you sure you'd like to logout?</p>
              <form action="" method="post">
                <input type="checkbox" name="alldevices" value="alldevices">Logout of all devices?<br />
                <input type="submit" name="confirm" value="Confirm" class="contact__final">
              </form>
              </div><!--Username-->
          </div><!--Email-->
        </div><!--Input-->
    </div>
