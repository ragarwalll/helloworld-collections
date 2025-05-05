<?php
include ( "./inc/header.inc.php");
include ( "./inc/register.inc.php" );
?>
<script type="text/javascript" src="./js/ajax_newaccount_email.js"></script>
<div class="form new-form">
      <a href="#" class="previous round hide">&#8249;</a>
      <h3 id="area">Digital Literacy Programme</h3>
      <h2 id="log">Sign Up<br></h2>

        <h2 id="new-details">for your DLP account</h2>
        <div class="input">
          <div class="email">
            <form action="" method="POST">
                <input type="text" name="first_name" autocomplete="off" placeholder="Enter your first name" class="user fname" />
                <div class="line user1"></div>
                <input type="text" name="last_name" autocomplete="off" placeholder="Enter your last name" class="user lname" />
                <div class="line user2"></div>
                <input type="email" name="email" autocomplete="off" onkeyup="checkitemail();" placeholder="Enter your email" class="user usercheckemail mail" />
                <div class="line user3"></div>
                <div id="email_check"></div>
                <input type="text" name="username" autocomplete="off" onkeyup="checkit();" placeholder="Enter your username" class="user usercheck name" id="set"  />
                <div class="line user4"></div>
                <div id="user_check"></div>
                <input type="password" name="password" class="pass pass1" placeholder="Enter your password" />
                <div class="line user5"></div>
                <span id="email_status" class="email_status"></span>
              <div class="sign"><input type="submit" name="signup" class="final" style="position: absolute;float: right;bottom: 35px;right: 41px;" value="Sign Up"></div>
            </form>
          </div><!--Email-->
        </div><!--Input--> 
    </div><!--Form-->
    <script type="text/javascript" src="./js/ajax_newaccount.js"></script>
    <script type="text/javascript" src="./js/hover-sign.js"></script>
    <script>
        $('.sign').hide();
        function check_details(){
            var fname = document.querySelector(".fname").value;
            var lname = document.querySelector(".lname").value;
            var pass = document.querySelector(".pass1").value;
            email=document.querySelector('#email_check').innerHTML;
            username=document.querySelector('#user_check').innerHTML;
            success="OK";
            if(email==success && username=="OK    " && fname && lname && pass){
                $('.sign').fadeIn();
            }  
            else{
                $('.sign').fadeOut();
            }
        }
        setInterval(function() 
        {
            check_details();
        },2500)
    </script>
    