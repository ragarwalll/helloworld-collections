<?php
$post_status="";
if(isset($_POST['post'])){
    $post_message=strip_tags($_POST['post']);
    if($post_message != ""){
        if($_FILES['post-image']['name'] !== ''){
            if((@$_FILES["post-image"]["type"]=="image/jpeg") || (@$_FILES["post-image"]["type"]=="image/png") || (@$_FILES["post-image"] ["type"]=="image/gif") || (@$_FILES["post-image"] ["type"]=="image/jpg") && (@$_FILES["post-image"] ["size"]<10048576))//10MB{
                $userdata= DB::query('SELECT userdata FROM users WHERE id=:id', array(':id'=>$userid))[0]['userdata'];
                $data = DB::query('SELECT userdata FROM users WHERE id=:byuser', array(':byuser'=>$userid))[0]['userdata'];
                
                //if (!file_exists("./assets/userdata/".$data."/post/" .@$_FILES["post-image"]["name"])){
                    move_uploaded_file(@$_FILES["post-image"]["tmp_name"], "./assets/userdata/".$data."/post/".$_FILES['post-image']['name']);
                    $dateadded=date("Y-m-d");
                    $profilepicname= @$_FILES['post-image']['name'];
                    DB::query('INSERT INTO posts VALUES(\'\',:body,:dateadded,:byuser,:selfuser,:img)',array(':body'=>$post_message,':dateadded'=>$dateadded,':byuser'=>$userid,':selfuser'=>$userid,'img'=>$profilepicname));
                    $postedid=DB::query('SELECT id FROM posts WHERE body=:body AND date_added=:dateadded',array(':body'=>$post_message,':dateadded'=>$dateadded))[0]['id'];
                    DB::query('INSERT INTO total_likes VALUES(\'\',\'\',:id)',array(':id'=>$postedid));
                //}                 
            } 
            else {
                $dateadded=date("Y-m-d");
                DB::query('INSERT INTO posts VALUES(\'\',:body,:dateadded,:byuser,:selfuser,\'\')',array(':body'=>$post_message,':dateadded'=>$dateadded,':byuser'=>$userid,':selfuser'=>$userid));
                $postedid=DB::query('SELECT id FROM posts WHERE body=:body AND date_added=:dateadded',array(':body'=>$post_message,':dateadded'=>$dateadded))[0]['id'];
                DB::query('INSERT INTO total_likes VALUES(\'\',\'\',:id)',array(':id'=>$postedid));                   
            }
        }
        
    }
    ?> 


<div class="profile--post">
        <div class="profile--post-wrapper">
            <form action="" method="post" enctype="multipart/form-data">
                <textarea name="post" id="normal" rows="5" class="profile-post-textarea" placeholder="Write your post here!"></textarea>
                <input type="image" src="./assets/img/textarea-post.png" name="send" width="30">
                <br>
                <label for="file-upload" class="post--photo">
                <input type="file" id="file-upload" name="post-image" class="post--image">
                <i class="fas fa-images"></i> Image/Video
            </form>
        </div>
    </div><br>