<?php include ( "./inc/connect.inc.php");
if(isset($_POST['emailTrue'])){
    $user=$_POST['emailTrue'];
    if(filter_var($user, FILTER_VALIDATE_EMAIL)){
        if(DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$user)))
        {
            echo "Email already registered";
        }
        else {
            echo "OK";
        }
    }
    else{
        echo "Invalid";
    }
}
?>