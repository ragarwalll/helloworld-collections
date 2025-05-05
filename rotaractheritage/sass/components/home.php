<?php $carousel="no";
include ( "./inc/header.inc.php");
if(!$userid){
    die("You must be logged in to view this page");
}

$post_status="";
include ( "./post_actions.php");
//posting
if(isset($_POST['post'])){
    $post_message=strip_tags($_POST['post']);
    if($post_message != ""){
        if($_FILES['post-image']['name'] !== ''){echo "Hi";
            if((@$_FILES["post-image"]["type"]=="image/jpeg") || (@$_FILES["post-image"]["type"]=="image/png") || (@$_FILES["post-image"] ["type"]=="image/gif") || (@$_FILES["post-image"] ["type"]=="image/jpg") && (@$_FILES["post-image"] ["size"]<10048576))//10MB{
                
                if (!file_exists("./assets/userdata/ifmjduhdfnu/post/" .@$_FILES["post-image"]["name"])){
                    move_uploaded_file(@$_FILES["post-image"]["tmp_name"], "./assets/userdata/ifmjduhdfnu/post/".$_FILES['post-image']['name']);
                    $dateadded=date("Y-m-d");
                    $profilepicname= @$_FILES['post-image']['name'];
                    DB::query('INSERT INTO posts VALUES(\'\',:body,:dateadded,:byuser,:selfuser,:img)',array(':body'=>$post_message,':dateadded'=>$dateadded,':byuser'=>$userid,':selfuser'=>$userid,'img'=>$profilepicname));
                    $postedid=DB::query('SELECT id FROM posts WHERE body=:body AND date_added=:dateadded',array(':body'=>$post_message,':dateadded'=>$dateadded))[0]['id'];
                    DB::query('INSERT INTO total_likes VALUES(\'\',\'\',:id)',array(':id'=>$postedid));
                    header("location:home");
                }                 
            }
            else {
                $dateadded=date("Y-m-d");
                DB::query('INSERT INTO posts VALUES(\'\',:body,:dateadded,:byuser,:selfuser,\'\')',array(':body'=>$post_message,':dateadded'=>$dateadded,':byuser'=>$userid,':selfuser'=>$userid));
                $postedid=DB::query('SELECT id FROM posts WHERE body=:body AND date_added=:dateadded',array(':body'=>$post_message,':dateadded'=>$dateadded))[0]['id'];
                DB::query('INSERT INTO total_likes VALUES(\'\',\'\',:id)',array(':id'=>$postedid));
                header("location:home");                    
            }
        }
        
    }

if(isset($_GET['like'])){
    post::likePost($_GET['like'], $userid);
}
if(isset($_GET['commenti'])){
    if(isset($_POST['comment'])){
        $comment=$_POST['comment'];
        if($comment != ""){
            post::commentPost($_GET['commenti'],$userid,$comment);
        }
    }
}

?>
<div class="load-bar" id="wait" style="position:fixed;z-index:9999999;">
  <div class="bar"></div>
  <div class="bar"></div>
  <div class="bar"></div>
</div>  

<div class="profile--wrapper">
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
    
    <?php
    $post_count=DB::query('SELECT count(*) FROM posts')[0]['count(*)'];

    $getposts=DB::query("SELECT * FROM posts ORDER BY id DESC LIMIT 5");
    foreach($getposts as $row){
        $id=$row['id'];
        $body=$row['body'];
        $date_added=$row['date_added'];
        $added_by=$row['added_by'];
        $user_posted_to=$row['user_posted_to'];
        //echo $added_by;
        
        $user_details = DB::query('SELECT * FROM users WHERE id=:id', array(':id'=>$added_by));
        foreach($user_details as $get_name){
            
            $firstname_post=$get_name['first_name'];
            $lastname_post=$get_name['last_name'];
            $profilepic_post=$get_name['profile_pic'];
            $username_post=$get_name['username'];
            //echo $lastname_post;    
        }
        //profile picture of the user posted
        if($profilepic_post=="")
        {
          $profilepic_post="./assets/img/default_dp.jpg";
        }
        else
        {
          if(!file_exists("userdata/profile_pics/".$profilepic_post))
          {
            $profilepic_post="img/default_dp.jpg";
          }
          else
          {
            $profilepic_post="userdata/profile_pics/".$profilepic_post;
          }
        }
        ?>
        <div class="profile-newfeed">
            <div class="profile--posted-by">
                <img src="<?php echo $profilepic_post;?>" height="40" style="border-radius: 50%" alt="">
                <a href="profile/user/<?php echo $username_post;?>" target="_blank"><?php echo $firstname_post." ".$lastname_post;?></a>
                <span><?php echo $date_added;?></span>
            </div>
            
            <!--body-->
            <br>&nbsp;&nbsp;<br><br>
            <div class="profile--body">
                <p><?php echo $body;?></p>
            </div>
            <!--end of body-->
            <?php $post_image=post::postImage($id,$userid);
            if($post_image){
            ?>
            <div class="post-image">
                <img src="./<?php echo $post_image;?>" alt="" class="post-image-content">
            </div>
            <?php }?>
            <div class="post--likes">
                <?php
                $ttl_likes=DB::query('SELECT total_likes FROM total_likes WHERE post_id=:id', array(':id'=>$id))[0]['total_likes'];
                
                echo $ttl_likes." people likes this";
                ?>
            </div>
            <hr>
            <div class="post--action">
                <div class="post--like">
                <form action="home/like/<?php echo $id;?>" method="post" name="like" class="post--like-unlike">
                <?php
                if(DB::query('SELECT user_id_liked FROM likes WHERE post_id=:post_id AND user_id_liked=:id', array(':post_id'=>$id, ':id'=>$userid))){
                    echo '<input type="submit" value="Unlike" class="post-like-form">';
                }
                else{
                    echo '<input type="submit" value="Like" class="post-like-form">';
                }?>   
                </form>
                </div>
                <div class="post--comment ">
                Comment
                </div>
            </div>
            <hr>
            <br>
            <div class="profile--comments">
                <div class="profile-post-comment">
                    <form action="home/commenti/<?php echo $id;?>" method="POST" class="abc-comment">
                        <img src="<?php echo $profilepic_post;?>" height="25" style="border-radius: 50%;transform: translateY(-12px);" alt="">
                        <textarea name="comment" id="normal" rows="1" class="text-comment" placeholder="Write your comment here!"></textarea>
                        <label for="comment_submit">
                        <input type="image" src="./assets/img/textarea-post.png" name="send" width="25">
                        </label>
                        <input type="submit" name="final_comment" class="comment_submit">
                    </form>
                </div>
                <?php
                $get_comments=DB::query('SELECT * FROM comments WHERE post_id=:id ORDER BY id DESC',array(':id'=>$id));
                foreach($get_comments as $comments_body){
                    $current_id=$comments_body['posted_by'];
                    $comment_name = DB::query('SELECT * FROM users WHERE id=:id', array(':id'=>$current_id));
                    $firstname_comment=$comment_name[0]['first_name'];
                    $lastname_comment=$comment_name[0]['last_name'];
                    $profilepic_comment=$comment_name[0]['profile_pic'];
                    $username_comment=$comment_name[0]['username'];
                ?>
                <div class="comment-all">
                    <div class="comment-all-body">
                        <img src="<?php echo $profilepic_post;?>" height="25" style="border-radius: 50%;transform: translateY(5px);" alt="">
                        <a href="profile/user/<?php echo $username_comment;?>" target="_blank"><?php echo $firstname_comment." ".$lastname_comment;?></a>
                        <span><?php echo $comments_body['post_body'] ?></span>
                    </div>
                </div><br>
                <?php }?>
            </div>
        </div>
        <br>
    <?php  
                
    }//end of posts
    ?>
</div> <!--End of profile--wrapper-->

<input type="hidden" id="row_posts" value="0">
<input type="hidden" id="all_posts" value="<?php echo $post_count; ?>">

<script src="./js/load_post.js"></script> 
<script src="./js/like_click.js"></script>
<script src='js/autoresize.jquery.min.js'></script>
<script>
	$(function(){
        var resize=document.querySelectorAll("#normal");
        var i;
        for(i=0;i<resize.length;i++){
        $(resize[i]).autosize();
        }
	});
</script>
<script>
$loading=$('#wait').hide()
$(document).ready(function(){
    $(document).ajaxStart(function(){
        $loading.show();
    });
    $(document).ajaxStop(function(){
        $loading.hide();
    });
});
</script>
<script>
var reveal=document.querySelectorAll(".post--comment");
var i;

for(i=0;i<reveal.length;i++){
reveal[i].addEventListener("click", activate);

function activate(e){
    $(this).parent().next().next().next().toggleClass('open');
};}
</script> 