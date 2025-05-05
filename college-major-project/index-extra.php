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
                    <li><a href="index.php" class="navItem navItem1">HOME</a></li>
                    <li><a href="dashboard.php" class="navItem">DASHBOARD</a></li>
                    <li><a href="contact.php" class="navItem">CONTACT</a></li>
                    <li><a href="contributors.php" class="navItem">CONTRIBUTORS</a></li>
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
                    <div class="paging">
                        <a href="" class="pageInc"><i class="fas fa-chevron-circle-left ico"></i> Previous Course</a>
                        <a href="" class="pageInc pageInc1">Next Course <i class="fas fa-chevron-circle-right ico"></i></a>
                    </div>
                <div class="index">
                        <a href="2.html">1</a><br>
                        <a href="">2</a><br>
                        <a href="">3</a><br>
                        <a href="">4</a><br>
                        <a href="">5</a><br>
                </div>
                <div class="main-wrapper">
                   <p id="starting" style="display:none;">Welcome to Digital Literacy Programme. Here we will help you give a basic idea about how to work on a computer. Starting from turning it on to working with word and google chrome and many more.</p>
                   <div id="demo"></div>
                   <script>
                        var i = 0;
                        var txt = document.querySelector("#starting").innerHTML;
                        var speed = 50;
                        var myVar2;
                        myVar2 = setTimeout(showtxt, 5700);
                        function showtxt() {
                            if (i < txt.length) {
                            document.getElementById("demo").innerHTML += txt.charAt(i);
                            i++;
                            setTimeout(showtxt, speed); 
                        }
                        }
                    </script>
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
})


</script>
</body>
</html>