<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <title>Mail Master</title>
</head>
<body>  
<?php


if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $text=$_POST['text'];
    $text=explode(" ", $text);
    for($i=0;$i<count($text);$i++){
        $j=$i;
        if($j>10){
            $j=$j%10;
        }
        
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $subject="[Happy Birthday]";
        $image=array("https://cdn.techgyd.com/Top-35-Best-Happy-Birthday-Meme-for-2019-27.jpg","https://cdn.ebaumsworld.com/mediaFiles/picture/2483755/85898318.jpg","https://i.pinimg.com/736x/33/d5/4b/33d54be3562974b8504e74e9fba1f02e.jpg","https://cdn.ebaumsworld.com/2018/08/19/055249/85745353/yung-no-mo-dr-evil-birthday-meme.jpg","https://sweetytextmessages.com/wp-content/uploads/2017/10/funny-birthday-meme-for-friend.jpg","https://i.kym-cdn.com/entries/icons/mobile/000/026/952/birthday_meme.jpg","https://blog.yellowoctopus.com.au/wp-content/uploads/2017/06/yellow-octopus-happy-birthday-meme-85.jpg","https://i.kym-cdn.com/photos/images/original/001/402/600/008.jpg","https://blog.yellowoctopus.com.au/wp-content/uploads/2017/06/yellow-octopus-happy-birthday-meme-92.jpg","https://blog.yellowoctopus.com.au/wp-content/uploads/2017/06/yellow-octopus-happy-birthday-meme-48.jpg");
        $message = "<html><head>
        <title>Happyyy Burrthhhdaaayyyyyyy</title>
        </head>
        
        <body style=\"background: #29353b;\">
        
        <div class=\"new\" style=\"padding:50px;\"><h1 style=\"color:white;\">$text[$i]</h1>
        <div class=\"new2\" style=\"\">
        <img src=\"$image[$j]\">
        </div></div>
        </body>";
        mail($email,$subject,$message,$headers);
        set_time_limit(20000);
    }
}
?>
    <div class="form">
        <form action="" method="post">
        <h3 id="area">Happy Birthday Mailer</h3>
        <h2 id="log">Wish your fav ones<br></h2>
        <h2 id="new-details">a happy birthday</h2>
            <div class="input">
                <input type="email" name="email" class="user" value="" placeholder="Enter email" autocomplete="off">
                <div class="line"></div>
            </div>
            <div class="input">
                <input type="text" name="text" class="pass" id="" placeholder="Enter text" autocomplete="off">
                <div class="line1"></div>
            </div>
            <input type="submit" value="Submit" name="submit" class="btn">
        </form>
    </div>
    <script src=./hover.js></script>
</body>
</html> 