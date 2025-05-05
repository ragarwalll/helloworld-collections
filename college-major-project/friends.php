<?php
include ( "./inc/header.inc.php");
if(!$userid){
    die("You must be logged in to view this page");
}
?>
<br><br>
<div class="profile--wrapper">
    <!--<div class="heading--people">
        <p>Find People Here!</p>
    </div>-->
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
    <table id="myTable" align="center">
        <tr style="display:none;">
            <th style="width:20%;"></th>
            <th style="width:60%;"></th>
            <th style="width:20%;"></th>
        </tr>
        <?php
            $get_user=DB::query('SELECT first_name, last_name, username, userdata FROM users');
            foreach($get_user as $details){
                $fname=$details['first_name'];
                $lname=$details['last_name'];
                $uname=$details['username'];
                $udata=$details['userdata'];
                if($username != $uname){
        ?>
        <tr>
            <td align="center"><img src="<?php print $_SERVER['MYVAR'];?>assets/userdata/<?php echo $udata;?>/dp.jpg" height="120" style="border-radius: 50%" alt="" target="_blank"></td>
            <td align><a href="<?php print $_SERVER['MYVAR'];?>profile.php?user=<?php echo $uname;?>" target="_blank" class="find-name"><?php echo $fname." ".$lname;?></a></td>
            <td align="center"><a href="<?php print $_SERVER['MYVAR'];?>messenger.php?to=<?php echo $uname?>" class="contact__final" target="_blank">Message</a></td>
        </tr>
        <?php
            }
        }
        ?>
    </table>
</div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>