<?php
include ( "./inc/header.inc.php");
if(!$userid){
    die("You must be logged in to vew this page");
}
?>

<div class="profile--wrapper">
<?php
$senddata = @$_POST['change_password'];
$old_password=strip_tags(@$_POST['oldpassword']);
$new_password=strip_tags(@$_POST['newpassword']);
$repeat_password=strip_tags(@$_POST['newpassword2']);

if($senddata){
    $pass=DB::query('SELECT password FROM users WHERE id=:id',array(':id'=>$userid))[0]['password'];
    if (password_verify($old_password, DB::query('SELECT password FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['password'])){
        if($new_password == $repeat_password){
            if(strlen($new_password) >=6 && strlen($repeat_password) <=60){
                DB::query('UPDATE users SET password=:password WHERE id=:userid', array(':password'=>password_hash($new_password, PASSWORD_BCRYPT), ':userid'=>$userid));
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
    else{
        echo "Incorrect old Password";
    }
    
}

?>

<div class="form">
    <div class="contact">
        <form action="" method="POST">
            <h3 id="area" class="contact__heading">Change your password</h3>
                <input type="password" name="oldpassword" id="oldpassword" class="contact__input" placeholder="Enter your old password here">
                <input type="password" name="newpassword" id="newpassword" class="contact__input" placeholder="Enter your new password here">
                <input type="password" name="newpassword2" id="newpassword2" class="contact__input" placeholder="Retype your password here"><br><br>
                    <input type="submit" name="change_password" id="change_password" class="contact__final" value="Update Password">
            </div>
        </form>
    </div>
</div>
</div>