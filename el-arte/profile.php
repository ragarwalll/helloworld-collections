<?php
include ( "./inc/header.inc.php");
$posts="";
$user="";
$isFollowing=False;
$verified=False;
if(isset($_GET['user']))
{
  if(DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$_GET['user'])))
  {
    $user=DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$_GET['user']))[0]['username'];
    $userid=DB::query('SELECT id FROM users WHERE username=:username', array(':username'=>$user))[0]['id'];
    $verified=DB::query('SELECT verified FROM users WHERE username=:username', array(':username'=>$_GET['user']))[0]['verified'];
    $followerid=Login::isloggedIn();

    if(isset($_POST['follow']))
    {
      if($userid != $followerid)
      {
        if (!DB::query('SELECT id FROM followers WHERE user_id=:userid AND follower_id=:follower_id', array(':userid'=>$userid, ':follower_id'=>$followerid)))
        {
          if($followerid == 13)
          {
            DB::query('UPDATE users SET verified=1 WHERE id=:user_id', array(':user_id'=>$userid));
          }
          DB::query('INSERT INTO followers VALUES(\'\',:user_id,:follower_id)', array(':user_id'=>$userid, ':follower_id'=>$followerid));
        }
        else
        {
          echo "Already Following";
        }
        $isFollowing=True;
      }
    }
    //unfollow
    if(isset($_POST['unfollow']))
    {
      if($userid != $followerid)
      {
        if (DB::query('SELECT id FROM followers WHERE user_id=:userid AND follower_id=:follower_id', array(':userid'=>$userid, ':follower_id'=>$followerid)))
        {
          if($followerid == 13)
          {
            DB::query('UPDATE users SET verified=0 WHERE id=:user_id', array(':user_id'=>$userid));
          }
          DB::query('DELETE FROM followers WHERE user_id=:user_id AND :follower_id=:follower_id', array(':user_id'=>$userid, ':follower_id'=>$followerid));
        }
        $isFollowing=False;
      }
    }
    if (DB::query('SELECT follower_id FROM followers WHERE user_id=:userid', array(':userid'=>$userid)))
    {
      //echo "Already Following";
      $isFollowing=True;
    }
    if(isset($_POST['post']))
    {
      $postbody=$_POST['postbody'];
      $LoggedInuserid=Login::isloggedIn();
      if(strlen($postbody)>160 || strlen($postbody)<1)
      {
        die("Incorrent Length");
      }
      if($LoggedInuserid == $userid){
        DB::query('INSERT INTO posts VALUES(\'\',:body, NOW(), :userid, \'\')', array(':body'=>$postbody, ':userid'=>$userid));
      }
      else {
        die("Incorrect User");
      }
    }
    if(isset($_GET['postid']))
    {
      if(!DB::query('SELECT user_id FROM post_likes WHERE post_id=:post_id AND user_id=:user_id',  array(':post_id'=>$_GET['postid'], ':user_id'=>$followerid)))
      {
        DB::query('UPDATE posts SET likes=likes+1 WHERE id=:id', array(':id'=>$_GET['postid']));
        DB::query('INSERT INTO post_likes VALUES(\'\',:post_id,:user_id)', array(':post_id'=>$_GET['postid'], ':user_id'=>$followerid));
      }
      else {
      DB::query('UPDATE posts SET likes=likes-1 WHERE id=:id', array(':id'=>$_GET['postid']));
      DB::query('DELETE FROM post_likes  WHERE post_id=:post_id AND user_id=:user_id', array(':post_id'=>$_GET['postid'], ':user_id'=>$followerid));
      }
    }
    $dbposts= DB::query('SELECT * FROM posts WHERE user_id=:userid ORDER BY id DESC', array(':userid'=>$userid));
    foreach($dbposts as $p) {

      if(!DB::query('SELECT post_id FROM post_likes WHERE post_id=:post_id AND user_id=:user_id',  array(':post_id'=>$p['id'], ':user_id'=>$followerid))){
        $posts.= htmlspecialchars($p['body'])."
        <form action='profile.php?user=$user&postid=".$p['id']."' method='post'>
          <input type='submit' name='like' value='like'>
          <span>".$p['likes']." Likes</span>
          </form>
          <hr /></br />";
        }
        else{
            $posts.= htmlspecialchars($p['body'])."
            <form action='profile.php?user=$user&postid=".$p['id']."' method='post'>
              <input type='submit' name='unlike' value='unlike'>
              <span>".$p['likes']." Likes</span>
              </form>
              <hr /></br />";
        }
    }
  }
  else
  {
      die("User not found");
  }
}
?>
<h1><?php echo $user ?>'s profile<?php if($verified){echo " - Verified";}?></h1>
<form action="profile.php?user=<?php echo $user ?>" method="post">
<?php
if($userid != $followerid)
{
  if(!$isFollowing){
    echo '<input type="submit" name="follow" value="Follow">';
  }
  else {
    echo '<input type="submit" name="unfollow" value="Unfollow">';
  }
}
?>
</form>
<form action="profile.php?user=<?php echo $user ?>" method="post">
  <textarea name="postbody" rows="8" cols="80"></textarea>
  <input type="submit" name="post" value="Post">
</form>

<div class="post">
  <?php echo $posts; ?>
</div>
