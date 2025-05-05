<?php include ( "./inc/connect.inc.php");
$username=stripslashes(htmlspecialchars($_GET['username']));
$profile=stripslashes(htmlspecialchars($_GET['profile']));
$message=stripslashes(htmlspecialchars($_GET['message']));
$date=$_GET['date'];
if($username=="" || $message=="" || $user=""){
  die();
}
$date=date("Y-m-d");
$opened="no";
DB::query('INSERT INTO pvt_messages VALUES(\'\',:fromuser,:touser,:body,:datee,:opened)',array(':fromuser'=>$username,':touser'=>$profile,':body'=>$message,':datee'=>$date,':opened'=>$opened));
?>