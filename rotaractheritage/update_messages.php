<?php include ( "./inc/connect.inc.php");

$username=stripslashes(htmlspecialchars($_GET['x']));

$yes="yes";
//DB::query('UPDATE pvt_messages SET opened=:yes WHERE user_to=:username AND user_from=:profilee',array(':yes'=>$yes,':username'=>$username,':profilee'=>$profile));

$query=DB::query('SELECT user_from,msg_body,date,opened from pvt_messages');

foreach($query as $variable){    

    if($variable[3] == "yes")
    {
        $variable[3] = "Seen";
    }
    else {
        $variable[3] = "";
    }
    echo $variable[0]."\\".$variable[1]."\\".$variable[2]."\\".$variable[3]."\n";
}

?>