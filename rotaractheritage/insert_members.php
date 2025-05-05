<?php
if (isset($_POST['uploadpic'])){
    if(isset($_FILES['profilepic'])){
        if(((@$_FILES["profilepic"]["type"]=="image/jpeg") || (@$_FILES["profilepic"]["type"]=="image/png") || (@$_FILES["profilepic"] ["type"]=="image/gif")) && (@$_FILES["profilepic"] ["size"]< 5000000))//1MB
        {
            $name=
            move_uploaded_file(@$_FILES["profilepic"]["tmp_name"], "userdata/profile_pics/$random/".$_FILES['profilepic']['name']);
        }
    }
    else {
        alert("Upload a Picture");
    }
    
}

?>
<form action="" method="POST" enctype="multipart/form-data">
<div class="inside3">
  <input type="text" name="member_name" autocomplete="off" placeholder="Enter name" /><br /><br />
  <input type="text" name="member_post" autocomplete="off" placeholder="Enter post" /><br /><br />
  <p>Upload picture of the member</p>
  <input type="file" name="profilepic" /><br /><br />
  <input type="submit" name="uploadpic" class="btn btn--primary" value="Upload" /><br /><br />
</div>
</form>