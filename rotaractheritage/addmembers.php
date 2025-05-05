<?php $carousel="no";
include ( "./inc/header.inc.php");
include ("./inc/addmember.inc.php");
?>
<div class="form">
      <a href="<?php print $_SERVER['MYVAR'];?>fee.php" class="previous round">&#8249;</a>
      <h3 id="area">Rotaract</h3>
      <h2 id="log">Add new Members<br></h2>
        <h2 id="new-details">THA</h2>
        <div class="input">
          <div class="email">
            <form action="" method="POST">
              <div class="username">
                <input type="text" name="member_name" autocomplete="off" placeholder="Enter member's name" class="user" id="set"  />
                <div class="line1 line"></div>
                <input type="email" name="member_email" class="pass" placeholder="Enter member's email" />
                <div class="line2 line"></div>
              </div><!--Username-->
              <div style="padding-top: 70px"></div>
              <input type="submit" name="add" class="final" style="float: right" value="Submit">   
            </form>
          </div><!--Email-->
        </div><!--Input-->
    </div><!--Form-->
    <script src=./js/hover-email-members.js></script>