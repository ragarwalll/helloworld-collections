<?php
if(isset($_POST['add']))
{
  $name=$_POST['member_name'];
  $email=$_POST['member_email'];

  if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    DB::query('INSERT INTO members VALUES(\'\',:member_name, :member_email)', array(':member_name'=>$name,':member_email'=>$email));  
  }
  $member_id = DB::query('SELECT id FROM members WHERE name=:member_name AND email_id=:member_email', array(':member_name'=>$name,':member_email'=>$email))[0]['id'];
  DB::query('INSERT INTO subscription VALUES(\'\',"1","1","1","1","1","1","1","1","0","0","0","0",:userid)', array(':userid'=>$member_id));
}
?>