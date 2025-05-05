<?php $carousel="no"; 
include ( "./inc/header.inc.php");
if(!$userid){
    die();
}
$username=DB::query('SELECT username FROM users WHERE id=:id',array(':id'=>$userid))[0]['username'];
if(isset($_GET['to'])){
    $profile=$_GET['to'];
    if($profile == $username){
        die();
    }
}
?>

<div class="write--message">
    <input type="text" name="msginput" id="msginput"  class="actual--message" onkeydown="if (event.keyCode == 13) sendmsg();" placeholder="write message...">
</div>
<div class="profile--wrapper">
    <br>
    <br>
    <hr style="margin:8px;">
    <div class="message-wrapper" id="msg-area"></div>
</div>
<br> <br> <br> 

<script type="text/javascript">
    var msginput=document.getElementById("msginput");
    var msgarea=document.getElementById("msg-area");
    
    function update(){
      var xmlhttp= new XMLHttpRequest();
      var username ="<?php echo $username; ?>";
      var profile ="<?php echo $profile; ?>";
      var output= "";
      xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 || xmlhttp.readyState == 200){
          var response= xmlhttp.responseText.split("\n")
          var rl=response.length
          var item="";
          for(var i=0; i<rl ; i++){
            item = response[i].split("\\")
            if(item[1] != undefined){
              if(item[0] == username){
                //Right side
                output += "<div class=\"message_right1\"></div><div class=\"message_right2\"><span>" + item[1] + "</span><h6 style='margin-bottom: 0;'>" + item[2] + "</h6><h6>" + item[3] + "</h6></div><hr />";;
              }
              else {
                output += "<div class=\"message_left1\"><span>" + item[1] + "</span><h6 style='margin-bottom: 0;'>" + item[2] + "</h6></div><div class=\"message_left2\"></div><hr />";
              }
            }
          }
          msgarea.innerHTML = output;
          msgarea.scrollTop = msgarea.scrollHeight;
        }
      }
      xmlhttp.open("GET", "update-messages.php?username=" + username + "&profile=" + profile, true);
      xmlhttp.send();
    }
    function sendmsg(){
        var message = msginput.value;
        if(message != ""){
            var username ="<?php echo $username;?>";
            var profile ="<?php echo $profile;?>"
            <?php $datee=date("Y-m-d");?>
            var datee ="<?php echo $datee;?>";
            var xmlhttp= new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState == 4 || xmlhttp.readyState == 200){
                    msgarea.innerHTML += "<div class=\"message_right1\"></div><div class=\"message_right2\"><span>" + message + "</span><h6>" + datee + "</h6></div><hr style='margin:8px;'>";
                    msginput.value = "";
                }
            }
            xmlhttp.open("GET", "insert_messages.php?username=" + username + "&profile=" + profile + "&message=" + message + "&date=" + datee, true);
            xmlhttp.send();
        }
    }
    setInterval(function() {update();},2500)

</script>