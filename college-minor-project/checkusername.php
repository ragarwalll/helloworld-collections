<?php include ( "./inc/connect.inc.php");
if(isset($_POST['usernameTrue'])){
    $user=$_POST['usernameTrue'];
    if(DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$user)))
    {
        echo "OK";
    }
    else {
        echo "Username not found";
    }
}
?>
    