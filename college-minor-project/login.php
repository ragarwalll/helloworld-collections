<?php
include ( "./inc/header.inc.php");
if($userid){
  Header("Location:home.php");
}
include ( "./inc/login.inc.php");?>
 <script>
      window.onload = function() {
        var name = localStorage.getItem("email");
        var status = localStorage.getItem("email_status");
          if (name !== null){
            $('#set').val(name);
          }
          if (status !== null){
            $( '#email_status' ).html(status);
          }
        }
      </script>
      <script type="text/javascript" src="./js/ajax.js"></script>
    <div class="form">
      <a href="#" class="previous round hide">&#8249;</a>
      <h3 id="area">Digital Literacy Programme</h3>
      <h2 id="log">Sign In<br></h2>

        <h2 id="new-details">with your DLP account</h2>
        <div class="input">
          <div class="email">
            <form action="" method="POST">
              <div class="username">
                <input type="text" name="user_login" autocomplete="off" onkeyup="checkit();" placeholder="Enter your username" class="user" id="set"  />
                <input type="password" name="password_login" class="pass hidden" placeholder="Enter your password" />
                <span id="email_status" class="email_status"></span>
                <div class="line"></div>
                <div class="pass_status hide"></div>
              </div><!--Username-->
              <div class="lining">
                <button class="next" href="" type="button">Next</button>
                <div class="centerit">
                  <a class="newpass" href="" >forgot password?</a></div>
              </div><!--lining-->
              <input type="submit" name="login" class="final hide" style="float: right" value="Login">   
              <div class="new-acc">
                <a class="newpass" href="./sign.php">Don't have a account? Sign Up</a>
              </div>
            </form> 
          </div><!--Email-->
        </div><!--Input-->
    </div><!--Form-->
    <script src=./js/hover-email.js></script>
    <script>
      window.onbeforeunload = function() {
        localStorage.setItem("email", $('.user').val());
        localStorage.setItem("email_status", document.querySelector("#email_status").innerHTML);
      }
    </script>
    
