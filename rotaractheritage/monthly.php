<?php

class month{

  public static function displayMonth($memberID, $month){
    $monthID = DB::query('SELECT id FROM subscription WHERE id_member=:memberid',array('memberid'=>$memberID))[0]['id'];
    $status=DB::query('SELECT `'.$month.'` FROM subscription WHERE id_member=:memberid',array(':memberid'=>$memberID))[0][$month];

    if(!DB::query('SELECT `'.$month.'` FROM subscription WHERE id_member=:id',array(':id'=>$memberID))[0][$month]){
    $post="<form action='fee.php?stat=$month&con=$monthID' method='post'>
            <input type='submit' name='unpaid' value='✘' class='unpaid'>
          </form>
            ";
    }
    else{
      $post="<form action='fee.php?stat=$month&con=$monthID' method='post'>
            <input type='submit' name='paid' value='✔' class='paid'>
          </form>
  ";
    }
     
    return $post;
  }
  
  public static function paymentStatus($id,$month){
    if(!DB::query('SELECT `'.$month.'` FROM subscription WHERE id=:id',array(':id'=>$id))[0][$month]){
      DB::query('UPDATE subscription SET `'.$month.'`="1" WHERE id=:id',array(':id'=>$id));
      $to = DB::query('SELECT email_id FROM members WHERE id=(SELECT id_member FROM subscription WHERE id=:id)',array(':id'=>$id))[0]['email_id'];
      $subject="Rotaract Club of The Heritage Academy";
      $months=array("January", "February","March","April","May","June","July","August","September","October","November","December");
      $count=count($months);
      for ($i=0; $i < $count; $i++) {
        if(!strcmp($month, (mb_substr($months[$i], 0, 3)))){
          $monthPaid="$months[$i]";
        }
      }
      $txt = "You have successfully paid for the month of ".$monthPaid."";
      $headers = "From: agarwal.rahul324@gmail.com";
      mail($to,$subject,$txt,$headers);
    }
    else{
      DB::query('UPDATE subscription SET `'.$month.'`="0" WHERE id=:id',array(':id'=>$id));
    }
  }
}

?>
