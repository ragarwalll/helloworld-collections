<?php include ('./checkcookie.php');
if(!Login::isLoggedIn()){
    header('location:initial.php');
}
$user=Login::isLoggedIn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/contributors.css">
    <link rel="stylesheet" href="./css/dashboard.css">
    <script type='text/javascript' src='./js-global/jquery.min.js'></script>
    <script src="./js/preloader.js"></script>
    <script src='js/jquery.ba-hashchange.min.js'></script>
    <link rel="shortcut icon" type="image/x-icon" href="./img/favicon.ico" />
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src='js/dynamicpage.js'></script>
    <title>Digital Literacy Programme</title>
</head>
<body>
    <div class="spinner-wrapper" id="loader">
        <div class="spinner">
            <div class="pencil_l"></div><div class="correct1"></div>
            <div class="pencil_s1"></div>
            <div class="data1"></div>
            <div class="data2"></div>
            <div class="data3"></div>
            <div class="data4"></div>
            <div class="pencil_r"></div>
            <div class="arrow_up"></div>
            <div class="correct2"></div>             
            <div class="pencil_h"></div>
        </div>
    </div>
    <div class="wrapup">
        <div class="center">
            <div class="conatiner-name">
                <?php echo "Hello ".$user;?>
            </div>
        </div>
    </div>
    <div id="container">    
        <header>
            <div class="container" id="nav">
            <div class="logo"><a href="index.php"> <img src="./img/logo.png" width="30" alt=""></div></a>
                <nav>
                    <ul>
                    <li><a href="index.php" class="navItem navItem1">DASHBOARD</a></li>
                    <li><a href="contact.php" class="navItem">CONTACT</a></li>
                    <li><a href="contributors.php" class="navItem">CONTRIBUTORS</a></li>
                    <li><div class="navItem divnew">Log In/Sign Up</div></li>
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
        
        <section id="main-content">
            <div id="guts">
                <div class="main-wrapper2">
                    <div class="levels">
                        <a href="./beginner/1.php" target="_blank" id="level">
                            <div class="level beginner">
                                <h3>Beginner</h3> 
                                <div class="begin--svg" style="background-color:#69639a"><svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-labelledby="title" version="1.1" class="icon--svg" height="24" width="24"><title>Learn Icon</title><path d="M15 16.6l4.351-4.6L15 7.4 16.324 6 22 12l-5.676 6L15 16.6zm-6 0L4.649 12 9 7.4 7.676 6 2 12l5.676 6L9 16.6z"></path></svg></div>
                                <p>Learn the basics of computer.</p>
                            </div>
                            </a>

                        <a href="./intermediate/" target="_blank" id="level">
                            <div class="level intermediate">
                                <h3>Intermediate</h3>
                                <div class="begin--svg" style="background-color:#4c7ef3"><svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-labelledby="title" version="1.1" class="icon--svg" height="24" width="24"><title>Glasses Icon</title><path d="M4.363 8.8a.65.65 0 0 0-.535.27c-.127.162-.182.4-.154.659l.453 3.229c.073.702.6 1.242 1.144 1.242h2.723c.58 0 1.234-.605 1.361-1.274l.962-3.446a.778.778 0 0 0-.054-.475.548.548 0 0 0-.454-.205H4.363zM7.752 16h-2.55c-1.378 0-2.585-1.26-2.755-2.86l-.425-2.99c-.093-.85.11-1.65.553-2.23C3.017 7.34 3.663 7 4.35 7h5.1c.706 0 1.344.35 1.752.96.093.15.178.31.246.49.366-.09.74-.09 1.097 0 .068-.18.153-.34.255-.49.4-.61 1.037-.96 1.75-.96h5.101c.688 0 1.335.34 1.777.92.433.58.637 1.38.552 2.19l-.433 3.07C21.386 14.74 20.17 16 18.802 16h-2.55c-1.326 0-2.618-1.19-2.941-2.7l-.765-2.71a.82.82 0 0 0-1.097 0l-.782 2.78C10.361 14.82 9.077 16 7.752 16zm6.439-7.2c-.2 0-.354.076-.454.205-.073.13-.091.335-.046.551l.917 3.294c.164.745.817 1.35 1.398 1.35h2.723c.536 0 1.071-.54 1.135-1.199l.462-3.315a.855.855 0 0 0-.154-.616.65.65 0 0 0-.535-.27H14.19z" fill-rule="nonzero"></path></svg></div>
                                <p>Learn the basics of Microsift Office.</p>
                            </div>
                        </a>

                        <a href="./advanced/" target="_blank" id="level">
                            <div class="level advanced">
                                <h3>Advanced</h3>
                                <div class="begin--svg" style="background-color:#6df0c2"><svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-labelledby="title" version="1.1" class="icon--svg" height="24" width="24"><title>Path Icon</title><g fill="none" fill-rule="evenodd"><path stroke="currentColor" d="M5 21h7v-6M12 9V3h7"></path><circle stroke="currentColor" stroke-width="2" cx="12" cy="12" r="2"></circle><circle stroke="currentColor" stroke-width="2" cx="3" cy="21" r="2"></circle><circle stroke="currentColor" stroke-width="2" cx="21" cy="3" r="2"></circle></g></svg></div>
                                <p>Delve into the world of internet.</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

<script>
$(".navItem").click(function() {
    $(this).addClass('navItem1').parent().siblings().children().removeClass('navItem1');
});
</script>
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
$('.divnew').click(function(e) {  
    window.location.href = "http://127.0.0.1/miniProject/login.php";
    });
})


</script>
</body>
</html>