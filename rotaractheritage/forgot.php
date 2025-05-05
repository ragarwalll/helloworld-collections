<?php $carousel="no";
include ( "./inc/header.inc.php");
if($userid){
  Header("Location:home.php");
}
?>
<script>
$("body").css({"background": "#fff"});
</script>
<script type="text/javascript" src="./js/ajax.js"></script>
<?php
if(isset($_POST['login'])){
    $un=$_POST['user_login'];
    if(DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$un)))
    {
        $cstrong=TRUE;
        $token=bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
        $user_id=DB::query('SELECT id FROM users WHERE username=:username', array(':username'=>$un))[0]['id'];
        $date=date("Y-m-d H:i:s");
        DB::query('INSERT INTO forget_token(token, user_id, date) VALUES(:token, :user_id, :datee)', array(':token'=>sha1($token),':user_id'=>$user_id,':datee'=>$date));
        $to=DB::query('SELECT email FROM users WHERE username=:username', array(':username'=>$un))[0]['email'];
        $text="Click on the following link to reset your password ".$_SERVER['MYVAR']."reset.php?token=".$token.".";
        $subject="Rotaract | Password Reset";
        $headers = "From: agarwal.rahul324@gmail.com";
        mail($to,$subject,$text,$headers);
        echo "<script>
            alert('Email Sent');
            </script>
        ";
    }
    else{
        echo "<script>
            alert('Email Not Found');
            </script>
        ";
    }
}
?>
<div class="form">
      <h3 id="area">Rotaract</h3><br>
      <h2 id="log">Enter your<br></h2>

        <h2 id="new-details">username for Rotaract account</h2>
        <div class="input">
          <div class="email">
            <form action="" method="POST">
              <div class="username"><br>
                <input type="text" name="user_login" autocomplete="off" onkeyup="checkit();" placeholder="Enter your username" class="user" id="set"  />
                <span id="email_status" class="email_status"></span>
                <div class="line"></div>
              </div><!--Username--><br><br><br>
              <input type="submit" name="login" class="final" style="float: right" value="Send Link">   
            </form> 
          </div><!--Email-->
        </div><!--Input-->
    </div><!--Form-->
    <script src=./js/hover-forget.js></script>