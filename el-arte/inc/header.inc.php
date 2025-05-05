<?php include ( "./inc/connect.inc.php");
include ( "./checkcookie.php");
if(Login::isloggedIn())
{
  $userid=Login::isloggedIn();
}
else {
  $userid=Login::isloggedIn();
}
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,
    initial scale=1">
    <title>El Arte</title>
    <script src="js/main.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <!--<script src="js/reload_message.js" type="text/javascript"></script>-->
    <link href="css/main.css" rel="stylesheet">
  </head>
  <body>
  <?php
  $username= DB::query('SELECT username from users WHERE id=:id', array(':id'=>$userid))[0]['username'];
  ?>
    <!--header===================-->
    <header class="main-header">
      <div class="container grid">
        <div class="logo">
          <img src="img/logo1.png" alt="El Arte">
        </div>
            <div class="search_box">
              <form action="search.php" method="GET" id="search">
                <input type="text" name="q" size="60" placeholder="Find friends">
              </form>
            </div>
            <nav class="main-nav">
              <ul class="unstyled-list">
              <?php
              if($userid)
              {?>
                <li><a href="home.php">Home</a></li>
                <li><a href="profile.php?user=<?php echo $username; ?>">Profile</a></li>
                <li><a href="my_messages.php">Messages</a></li>
                <li><a href="friend_requests.php">Requests</a></li>
                <li><a href="my_pokes.php">Pokes</a></li>
                <li><a href="account_settings.php">Settings</a></li>
                <li><a href="logout.php">Log Out</a></li>
              <?php }else{?>
                <ul class="unstyled-list">
                <li><a href="index.php">Sign up/Log in</a></li>
                <li><a href="">Blog</a></li> <?php } ?>
              </ul>
            </nav>
            <div class="nav-toggle">
              <div class="hamburger"></div>
            </div>
          </div>
        </header>
        <div id="wrapper">
        <br />
        <br />
        <script
              src="https://code.jquery.com/jquery-2.2.4.min.js"
              integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
              crossorigin="anonymous"></script>
        <script src="js/search_icon.js"></script>
        <script src="js/nav.js"></script>
        <script src="https://use.fontawesome.com/97974f9c24.js"></script>
