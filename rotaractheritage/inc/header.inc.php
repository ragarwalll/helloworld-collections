<?php include ( "./inc/connect.inc.php");
include ( "./checkcookie.php");
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
    <link rel="shortcut icon" type="image/x-icon" href="<?php print $_SERVER['MYVAR'];?>assets/favicon.png" />
    <script src="<?php print $_SERVER['MYVAR'];?>js/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="<?php print $_SERVER['MYVAR'];?>js/w3sort.js"></script>
    <?php if($carousel == "yes"){
      echo '<link rel="stylesheet" type="text/css" href="'.$_SERVER["MYVAR"].'slick/slick.css">';echo "\n    ";
      echo '<link rel="stylesheet" type="text/css" href="'.$_SERVER["MYVAR"].'css/slider.css">';echo "\n    ";
      echo '<link rel="stylesheet" type="text/css" href="'.$_SERVER["MYVAR"].'slick/slick-theme.css">';echo "\n    ";
      echo '<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">';echo "\n";
    }
    ?>
    <link rel="stylesheet" href="<?php print $_SERVER['MYVAR'];?>css/main.css">
    <script src="<?php print $_SERVER['MYVAR'];?>js/preloader.js"></script>
    <title>Rotaract | THA</title>
  </head>
  <body>
    <div class="spinner-wrapper" id="loader">
        <div class="spinner"></div>
    </div>
    <!--- Preload End-->
    <section class="cover">
        <div class="container">
        <nav>
            <input type="checkbox" id="nav" class="hidden">
            <label for="nav" class="nav-btn">
                <i id="bar"></i>
                <i id="bar"></i>
                <i id="bar"></i>
            </label>
             
            <div class="nav-wrapper" id="nav__">
              <ul>
                  <li><a href="javascript: void(0);" id="na">About us</a></li>
                  <li><a href="<?php print $_SERVER['MYVAR'];?>index" id="na">Home</a></li>
                  <li><a href="<?php print $_SERVER['MYVAR'];?>login.php" id="na">Sign In/Sign Up</a></li>
                  <li><a href="<?php print $_SERVER['MYVAR'];?>events" id="na">Events</a></li>
                  <li><a href="<?php print $_SERVER['MYVAR'];?>members" id="na">Board Members</a></li>
                  <li><a href="https://www.rotasiagoa2019.com/" id="na" target="_blank">Rotasia Goa 2019</a></li>
                  <li><a href="<?php print $_SERVER['MYVAR'];?>contact" id="na">Contact Us</a></li>
              </ul>
          </div>
          <div class="nav-wrapper" id="nav__aboutus">
              <ul>
                  <li><a href="<?php print $_SERVER['MYVAR'];?>overview" id="na">Rotaract Overview</a></li>
                  <li><a href="<?php print $_SERVER['MYVAR'];?>history" id="na">Rotaract History</a></li>
                  <!--<li><a href="" id="na">Standard Rotaract Consitution</a></li>-->
                  <li><a href="https://www.rsamdio.org/" id="na" target="_blank">MDIO - RSAMDIO</a></li>
                  <li><a href="https://www.rotary.org/" id="na" target="_blank">Rotaract International</a></li>
                  
                  <li><a onclick="backtoit();" id="na">back</a></li>
              </ul>
          </div>
        </nav>
      </div>
    </section>
    
    <!--
    <script>
      var nav = document.querySelectorAll("#na")
      for(i=0;i<nav.length;i++){
      $(nav[i]).click(function(){
        $('input[type="checkbox"]:checked').prop('checked',false);
      });}
    </script>-->
    <script>
      var ul = document.getElementById("nav__").getElementsByTagName('ul');
      var aboutus = document.getElementById("nav__aboutus");
      $(aboutus).hide();
      for (var i = 0; i < ul.length; i++) {
        ul[i].addEventListener('click', clickHandler)
      }

      function clickHandler(e) {
        if(e.target.innerHTML == "About us"){
          $(ul).hide();
          $(aboutus).show();
        }
      }

      function backtoit(){
        $(aboutus).hide();
        $(ul).show();
      }
    </script>
