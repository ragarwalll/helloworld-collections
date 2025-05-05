<?php
if(isset($_POST['signup']))
{
  $fn= $_POST['first_name'];
  $ln= $_POST['last_name'];
  $un= $_POST['username'];
  $em= $_POST['email'];
  $pswd= $_POST['password'];
  $d= date("Y-m-d");
  $cstrong=TRUE;
  $token=bin2hex(openssl_random_pseudo_bytes(20, $cstrong));
  mkdir("./assets/userdata/".$token);
  mkdir("./assets/userdata/".$token."/post");
  copy("./assets/userdata/dp.jpg", "./assets/userdata/".$token."/dp.jpg");
  DB::query('INSERT INTO users VALUES(\'\',:username, :first_name, :last_name, :email, :password, :sign_up_date, :userdata)', array(':username'=>$un,':first_name'=>$fn,':last_name'=>$ln,':email'=>$em,':password'=>password_hash($pswd, PASSWORD_BCRYPT),':sign_up_date'=>$d,':userdata'=>$token));
 
  die("<h2>Welcome to Digital Literacy Programme</h2>Login in to get started");
}