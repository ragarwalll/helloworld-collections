<?php include ('./checkcookie.php');
if(Login::isLoggedIn()){
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="./img/favicon.ico" />
    <link rel="stylesheet" href="./css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>Digital Literacy Programme</title>
</head>
<body> 
<?php
if(isset($_POST['submit_form'])){
    $name=$_POST['name'];
    $age=$_POST['age'];
    $occ=$_POST['occupation'];

    if($name){
        if($age){
            setcookie("NAME", $name, time() + 60 * 60 * 24 * 7,'/', NULL, NULL, TRUE);
            setcookie("OCC", $occ, time() + 60 * 60 * 24 * 7,'/', NULL, NULL, TRUE);
            header("location:index.php");
        }
        else{
            ?>
            <script>
                myVar = setTimeout(showPage, 1500);
                function showPage() {
                    $('.age-alert').fadeIn();
                }
            </script>    
    <?php
        }
    }
    else{
    ?>
    <script>
        myVar = setTimeout(showPage, 1500);
        function showPage() {
            $('.name-alert').fadeIn();
        }
    </script>    
    <?php
    }   
}
?>
    <!--
    <div class="center">
        <div class="container">
            <p>Hi</p>
        </div>
    </div>
    -->
    <div class="space" style="display:block;"></div>
    <div class="main-form">
        <h3 id="main">Welcome</h3>
        <h2 id="log">Fill the details<br></h2>
        <h2 id="new-details">to get started</h2>
        <form action="" method="POST" id="main_form__">
            <div class="space" style="padding-top:0px;">
                <input type="text" name="name" placeholder="Enter your name" class="details name" autocomplete="off">
                <div class="line lineName"></div>
                <i class="fa fa-exclamation-circle alert name-alert" aria-hidden="true"></i>
            </div>
            <div class="space">
                <input type="text" name="age" placeholder="Enter your age" class="details age" autocomplete="off">
                <div class="line lineAge"></div>
                <i class="fa fa-exclamation-circle alert age-alert" aria-hidden="true"></i>
            </div>    
            <div style="padding-bottom:30px;"></div>
            <div class="space">
                <select name="occupation" class="details occupation">
                    <option value="student">Student</option>
                    <option value="parent">Parent</option>
                </select>
            </div>
            <input type="submit" name="submit_form" class="submit-form">
        </form>
    </div>
    <script src='js/pretexts.js'></script>
    <script src='js/form.js'></script>
</body>
</html>