<?php 
include ( "./inc/header.inc.php");
if(!$userid){
    die("You must be logged in to view this page");
}
?><br><br><br>
<div class="profile--wrapper">
    <div class="unread">
        
        <?php
            $get_user=DB::query('SELECT DISTINCT user_from FROM pvt_messages WHERE opened="no" AND user_to=:user', array(':user'=>$username));
            foreach($get_user as $each){
                $from=$each['user_from'];
                $get_id=DB::query('SELECT max(id) FROM pvt_messages WHERE opened="no" AND user_to=:user AND user_from=:fromm', array(':user'=>$username,':fromm'=>$from));
                foreach($get_id as $get_final_id){
                    $final_id=$get_final_id['max(id)'];
                        if($final_id){
                            echo '<p style="margin-bottom:5px;">Unread Messages</p><hr style="margin-bottom:25px;">';
                    
                        $get_message=DB::query('SELECT msg_body,user_from,date FROM pvt_messages WHERE id=:id', array(':id'=>$final_id));
                        foreach($get_message as $final){
                            $message=$final['msg_body'];
                            $fromuser=$final['user_from'];
                            $date=$final['date'];
                            $message=substr($message,0,100)."....";

                            $get_user=DB::query('SELECT first_name, last_name, username, userdata FROM users WHERE username=:user', array(':user'=>$fromuser));
                            foreach($get_user as $details){
                                $fname=$details['first_name'];
                                $lname=$details['last_name'];
                                $uname=$details['username'];
                                $udata=$details['userdata'];
                            ?>
                                <div class="from_name">
                                    <img src="<?php print $_SERVER['MYVAR'];?>assets/userdata/<?php echo $udata;?>/dp.jpg" height="40" style="border-radius: 50%;transform:translate(10px,14px);" alt="" target="_blank">
                                    <a href="<?php print $_SERVER['MYVAR'];?>profile.php?user=<?php echo $uname;?>" target="_blank" class="find-name name-message"><?php echo $fname." ".$lname;?></a>
                                    <p><a href="<?php print $_SERVER['MYVAR'];?>messenger.php?to=<?php echo $uname?>" class="actual" target="_blank"><?php echo $message;?></a></p>
                                </div><?php
                            }
                        }
                    }
                }
            }
        ?>
    </div>
    <div class="read">
        <p style="margin-bottom:5px;">Read Messages</p><hr style="margin-bottom:25px;">
        <?php
            $get_user=DB::query('SELECT DISTINCT user_from FROM pvt_messages WHERE opened="yes" AND user_to=:user', array(':user'=>$username));
            foreach($get_user as $each){
                $from=$each['user_from'];
                $get_id=DB::query('SELECT max(id) FROM pvt_messages WHERE opened="yes" AND user_to=:user AND user_from=:fromm', array(':user'=>$username,':fromm'=>$from));
                foreach($get_id as $get_final_id){
                    $final_id=$get_final_id['max(id)'];
                    $get_message=DB::query('SELECT msg_body,user_from,date FROM pvt_messages WHERE id=:id', array(':id'=>$final_id));
                    foreach($get_message as $final){
                        $message=$final['msg_body'];
                        $fromuser=$final['user_from'];
                        $date=$final['date'];
                        $message=substr($message,0,100)."....";

                        $get_user=DB::query('SELECT first_name, last_name, username, userdata FROM users WHERE username=:user', array(':user'=>$fromuser));
                        foreach($get_user as $details){
                            $fname=$details['first_name'];
                            $lname=$details['last_name'];
                            $uname=$details['username'];
                            $udata=$details['userdata'];
                        ?>
                            <div class="from_name">
                                <img src="<?php print $_SERVER['MYVAR'];?>assets/userdata/<?php echo $udata;?>/dp.jpg" height="40" style="border-radius: 50%;transform:translate(10px,14px);" alt="" target="_blank">
                                <a href="<?php print $_SERVER['MYVAR'];?>profile.php?user=<?php echo $uname;?>" target="_blank" class="find-name name-message"><?php echo $fname." ".$lname;?></a>
                                <p><a href="<?php print $_SERVER['MYVAR'];?>messenger.php?to=<?php echo $uname?>" class="actual" target="_blank"><?php echo $message;?></a></p>
                            </div><?php
                        }
                    }
                }
            }
        ?>
    </div>
</div>