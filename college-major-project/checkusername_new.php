<?php  include ( "./inc/connect.inc.php");
if(isset($_POST['usernameTrue'])){
    $user=$_POST['usernameTrue'];
    if(strlen($user) > 3 ){
        if(DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$user)))
        {
            echo "Username Unavailable";
        }
        else {
            echo "OK";
        }
    }
    else{
        echo "Must be greater than 3 characters";
    }
}
?>
    