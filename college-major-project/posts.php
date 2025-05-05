<?php $carousel="no";
include ( "./inc/connect.inc.php");
include ( "./checkcookielogin.php");
$userid = Login::isloggedIn();
if(!$userid){
    die("You must be logged in to view this page");
} 
include ( "./post_actions.php");
$row = (int)$_POST['row'];
$getposts = DB::query('SELECT * FROM posts ORDER BY id DESC limit 5 OFFSET '.$row.';');

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
        $userdata_post=$get_name['userdata'];
        //echo $lastname_post;    
        $username_post=$get_name['username'];
    }
    
    ?>
    <div class="profile-newfeed">
        <div class="profile--posted-by">
            <img src="<?php print $_SERVER['MYVAR'];?>assets/userdata/<?php echo $userdata_post;?>/dp.jpg" height="40" style="border-radius: 50%" alt="">
            <a href="<?php print $_SERVER['MYVAR'];?>profile.php?user=<?php echo $username_post;?>" target="_blank"><?php echo $firstname_post." ".$lastname_post;?></a>
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
            <img src="<?php print $_SERVER['MYVAR'];?><?php echo $post_image;?>" alt="" class="post-image-content">
        </div>
        <?php }?> 
        <div class="post--likes" style="display:inline; padding-right:0px;  ">
            <?php
            $likesall=DB::query('SELECT total_likes FROM total_likes WHERE post_id=:postid', array(':postid'=>$id))[0]['total_likes'];
            echo $likesall;
            ?>
        </div> 
        <div style="display:inline; padding-left:0px;" class="post--likes">people likes this</div>
        <hr>
        <div class="post--action">
            <div class="post--like">
            <form action="<?php print $_SERVER['MYVAR'];?>home.php?like=<?php echo $id;?>" method="post" name="like" class="post--like-unlike">
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
                <form action="<?php print $_SERVER['MYVAR'];?>home.php?commenti=<?php echo $id;?>" method="POST" class="abc-comment">
                    <img src="<?php print $_SERVER['MYVAR'];?>assets/userdata/<?php echo $userdata_post;?>/dp.jpg" height="25" style="border-radius: 50%;transform: translateY(-12px);" alt="">
                    <textarea name="comment" id="normal" rows="1" class="text-comment" placeholder="Write your comment here!" style="overflow: hidden; overflow-wrap: break-word; height: 50px;"></textarea>
                    <label for="comment_submit">
                    <input type="image" src="<?php print $_SERVER['MYVAR'];?>assets/img/textarea-post.png" name="send" width="25">
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
                $userdata_comment=$comment_name[0]['userdata'];
                $username_comment=$comment_name[0]['username'];
            ?>
            <div class="comment-all">
                <div class="comment-all-body">
                    <img src="<?php print $_SERVER['MYVAR'];?>assets/userdata/<?php echo $userdata_comment;?>/dp.jpg" height="25" style="border-radius: 50%;transform: translateY(5px);" alt="">
                    <a href="<?php print $_SERVER['MYVAR'];?>profile.php?user=<?php echo $username_comment;?>" target="_blank"><?php echo $firstname_comment." ".$lastname_comment;?></a>
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
