<!--===========header=============-->
<div class="rota-150-logo"><a href=""><img src="<?php print $_SERVER['MYVAR'];?>/assets/img/log1o.png" alt="" id="image-home" style="margin:0px"></a></div>
<header class="main-header" style="z-index:99;">
      <div class="grid-header contain-header">
        <nav class="main-nav" id="nav__login">
          <ul class="unstyled-list new-header-ul">
            <li class="new-header-li"><a href="<?php print $_SERVER['MYVAR'];?>home.php" id="main-nav-a">Home</a></li>
            <li class="new-header-li"><a href="<?php print $_SERVER['MYVAR'];?>profile.php?user=<?php echo $username;?>" id="main-nav-a">Profile</a></li>
            <li class="new-header-li"><a href="<?php print $_SERVER['MYVAR'];?>messages.php" id="main-nav-a">Messages</a></li>
            <li class="new-header-li"><a href="<?php print $_SERVER['MYVAR'];?>friends.php" id="main-nav-a">Find People</a></li>
            <li class="new-header-li"><a href="<?php print $_SERVER['MYVAR'];?>fee.php" id="main-nav-a">Subscripton</a></li>
            <li class="new-header-li"><a href="<?php print $_SERVER['MYVAR'];?>settings.php" id="main-nav-a">Account Settings</a></li>
            <li class="new-header-li"><a href="<?php print $_SERVER['MYVAR'];?>logout.php" id="main-nav-a">Logout</a></li>
        </nav>

        <div class="nav-toggle">
          <div class="hamburger"></div>
        </div>
      </div>
    </header>
    <script>
    $(document).ready(function() {

      $('.nav-toggle').click(function() {
        $('.main-nav').toggleClass('is-open')
        $('.hamburger').toggleClass('is-open')
        $('.nav-btn').toggleClass('hidden')  

      })
    })
    </script>
