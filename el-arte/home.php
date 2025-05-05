<?php
include ( "./inc/header.inc.php");
$showTimeline=True;
if($userid)
{
  $showTimeline=True;
}
else
{
    die("You must be logged in you view this page");
}
$followingposts=DB::query('SELECT posts.body,users.`username`,posts.likes
  FROM users,posts,followers
  WHERE posts.user_id=followers.user_id
  AND users.id=posts.user_id
  AND follower_id=:user_id', array(':user_id'=>$userid));
foreach ($followingposts as $post) {
  echo $post['username']."<br>";
  echo $post['body'];
  echo $post['likes']."<hr>";
  // code...
}
?>
