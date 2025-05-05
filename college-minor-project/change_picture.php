<?php
include ( "./inc/header.inc.php");
if(!$userid){
    die("You must be logged in to vew this page");
}
?>

<div class="profile--wrapper">
    <?php
    if(isset($_FILES['profilepic'])){
        if(((@$_FILES["profilepic"]["type"]=="image/jpeg") || (@$_FILES["profilepic"]["type"]=="image/png") || (@$_FILES["profilepic"] ["type"]=="image/gif")) && (@$_FILES["profilepic"] ["size"]<10048576))//1MB
        {
            $get_dir=DB::query('SELECT userdata FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['userdata'];
            move_uploaded_file(@$_FILES["profilepic"]["tmp_name"], "assets/userdata/$get_dir/dp.jpg");
        }

    }
    $get_data=DB::query('SELECT userdata FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['userdata'];
    ?>

    <div class="form">
        <div class="contact">
            <h3 id="area" class="contact__heading">Edit you account settings</h3>
            <form action="" method="POST" enctype="multipart/form-data">
            <h2 class="contact__detail ">Upload Your Profile Photo</h2>
                    <div class="inside3">
                        <img src="http://127.0.0.1/miniProject/assets/userdata/<?php echo $get_data;?>/dp.jpg" width="120" style="margin:5px;"><br>
                        <input type="file" name="profilepic" /><br /><br />
                        <input type="submit" name="uploadpic" class="contact__final" value="Upload" /><br /><br />
                    </div>
                </div>
            </form>
        </div>
    </div>    
</div>