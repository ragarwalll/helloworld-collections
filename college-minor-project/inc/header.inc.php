<?php include ( "./inc/connect.inc.php");
include ( "./checkcookielogin.php");
//Checks if a user is logged in or not
if(Login::isloggedIn())
{
  $userid=Login::isloggedIn();
  $username= DB::query('SELECT username from users WHERE id=:id', array(':id'=>$userid))[0]['username'];
}
else {
  $userid=Login::isloggedIn();
}//End of checking ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="./img/favicon.ico" />
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="./css/style.css">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>Digital Literacy Programme</title>
</head>
<body>
    <div id="container">    
        <header>
            <div class="container" id="nav">
            <div class="logo"><a href="index.php"> <img src="./img/logo.png" width="30" alt=""></div></a>
                <nav>
                    <ul>
                    <?php if(!$userid){?>
                    <li><a href="index.php" class="navItem ">DASHBOARD</a></li>
                    <li><a href="contact.php" class="navItem">CONTACT</a></li>
                    <li><a href="contributors.php" class="navItem">CONTRIBUTORS</a></li>
                    <li><a href="login.php" class="navItem">Log In/Sign Up</a></li>
                    <?php }
                    else {?>
                    <li><a href="home.php" class="navItem">HOME</a></li>
                    <li><a href="profile.php?user=<?php echo $username;?>" class="navItem">PROFILE</a></li>
                    <li><a href="messages.php" class="navItem">MESSAGES</a></li>
                    <li><a href="friends.php" class="navItem">FIND PEOPLE</a></li>
                    <li><a href="message_contributors.php" class="navItem">CONTRIBUTORS</a></li>
                    <li><a href="settings.php" class="navItem">ACCOUNT SETTINGS</a></li>
                    <li><a href="logout.php" class="navItem">LOGOUT</a></li>
                    <?php }?>
                    </ul>
                </nav>
                <div class="nav-toggle">
                    <div class="hamburger"></div>
                </div>
                <div class="nav-toggle1">
                        <div class="hamburger1"></div>
                </div>
            </div>
        </header>
    </div>

<script>
$(document).ready(function() {

$('.nav-toggle').click(function() {
  $('.hamburger').toggleClass('nav-open')
  $('nav').toggleClass('open')
  $('header').toggleClass('isopen')
  
})

$('.nav-toggle1').click(function() {
  $('.hamburger1').toggleClass('nav-open1')
  $('.index').toggleClass('show')
  
})
})


</script>
</body>
</html>