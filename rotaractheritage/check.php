<?php
include ( "./inc/connect.inc.php");
$body="hi";

$po=10;
if(DB::query("INSERT INTO comments(post_body,posted_by,post_id) VALUES(:a, :b, :c)", array(":a"=>$body,":b"=>$po,":c"=>$po)))
{
    echo "done";
}
else{
    echo "no";
}
echo "hi";
?>