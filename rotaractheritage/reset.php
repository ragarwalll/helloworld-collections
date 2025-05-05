<?php $carousel="no";
include ( "./inc/header.inc.php");
if(isset($_GET['token'])){
    $token=$_GET['token'];
    if(DB::query('SELECT user_id from forget_token WHERE token=:token',array(':token'=>sha1($token)))){
        $user_id=DB::query('SELECT user_id from forget_token WHERE token=:token',array(':token'=>sha1($token)))[0]['user_id'];
        ?>
        <script>
        $("body").css({"background": "#fff"});
        </script>
        <div class="profile--wrapper">
        <?php
        $senddata = @$_POST['change_password'];
        $new_password=strip_tags(@$_POST['newpassword']);
        $repeat_password=strip_tags(@$_POST['newpassword2']);

        if($senddata){
                if($new_password == $repeat_password){
                    if(strlen($new_password) >=6 && strlen($repeat_password) <=60){
                        DB::query('UPDATE users SET password=:password WHERE id=:userid', array(':password'=>password_hash($new_password, PASSWORD_BCRYPT), ':userid'=>$user_id));
                        echo "Password changed successfully";
                    }
                    else{
                        echo "Your password must be between 6 and 60 characters long";
                    }
                }
                else{
                    echo "New password doesn't match";
                }            
        }

        ?>

        <div class="form">
            <div class="contact">
                <form action="" method="POST">
                    <h3 id="area" class="contact__heading">Change your password</h3>
                        <input type="password" name="newpassword" id="newpassword" class="contact__input" placeholder="Enter your new password here">
                        <input type="password" name="newpassword2" id="newpassword2" class="contact__input" placeholder="Retype your password here"><br><br>
                            <input type="submit" name="change_password" id="change_password" class="contact__final" value="Update Password">
                    </div>
                </form>
            </div>
        </div>
        </div>
    <?php
    }
    else{
        die("Invalid Link");
    }
}
?>
<script src=""></script>