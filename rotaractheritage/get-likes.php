<?php

$ttl_likes=DB::query('SELECT total_likes FROM total_likes WHERE post_id=:id', array(':id'=>$id))[0]['total_likes'];
echo $ttl_likes." people likes this";
?>