<?php include ( "./inc/connect.inc.php");
    $user=$_POST['usernameTrue'];
    if(DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$user)))
    {
        echo "OK";
    }
    else {
        echo "Username not found";
    }

?>
