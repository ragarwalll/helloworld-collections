<?php
include ( "./inc/header.inc.php");
if(!$userid){
    die("You must be logged in to vew this page");
}
?>

<div class="profile--wrapper">
<?php
$get_info= DB::query('SELECT first_name, last_name FROM users WHERE id=:id',array(':id'=>$userid));
foreach($get_info as $get_row){
    $i_firstname=$get_row['first_name'];
    $i_lastname=$get_row['last_name'];
}
$user_info= @$_POST['user_info'];
if($user_info)
{
  $firstname=strip_tags(@$_POST['fname']);
  $lastname=strip_tags(@$_POST['lname']);
  DB::query('UPDATE users SET first_name=:fn WHERE id=:id',array(':fn'=>$firstname,':id'=>$userid));
  DB::query('UPDATE users SET last_name=:ln WHERE id=:id',array(':ln'=>$lastname,':id'=>$userid));
}

?>

<div class="form">
    <div class="contact">
        
        <form action="" method="POST">
            <h3 id="area" class="contact__heading">Update your profile info</h3>
            
            <input type="text" name="fname" id="fname" class="contact__input" value="<?php echo $i_firstname; ?>">
            <input type="text" name="lname" id="lname" class="contact__input" value="<?php echo $i_lastname; ?>"><br /><br />
            <input type="submit" name="user_info" id="user_info" class="contact__final" value="Update Information">


        </form>
    </div>
</div>        
</div>