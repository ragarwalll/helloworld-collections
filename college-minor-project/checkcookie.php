<?php
class Login
{
  public static function isloggedIn()
  {
    if (isset($_COOKIE['NAME']))
    {
        if(isset($_COOKIE['OCC'])){
            $user = $_COOKIE['NAME'];
        }
        return $user;
    }
    else {
      return false;
    }
  }
}
?>
