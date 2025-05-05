<?php
include ('./inc/connect.inc.php');
include ('./checkcookie.php');

if (Login::isloggedIn())
{
  echo 'Logged In';
  echo Login::isloggedIn();
}
else
{
    echo 'Not logged';
}
?>
