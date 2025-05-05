<?php
include ( "./inc/connect.inc.php");
$xls_filename = 'export_'.date('Y-m-d').'.xls';

$table='subscription';
$column_name=DB::query('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = :tablename ORDER BY ORDINAL_POSITION ',array(':tablename'=>$table));

$result = DB::query('SELECT * FROM subscription');
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t";

foreach($column_name as $p){
  echo $p["COLUMN_NAME"] . "\t";
}
print("\n");

$column_total= DB::count("SELECT * FROM subscription");
$row_total=count($result);
$paid="Paid";
$unpaid="Unpaid";
  
for ($i=0; $i <$row_total; $i++){ 
  $schema_insert = "";
  $data=$result[$i];
  $pos=$data[$column_total-1];
  $name = DB::query('SELECT name FROM members WHERE id=:theid',array(':theid'=>$pos))[0]['name'];
  $schema_insert .= "$name".$sep;
  for($j=1; $j<$column_total-1; $j++){  
    $new_data=$data[$j];
    if($new_data != ""){
      if($new_data == "0"){
        $schema_insert .= "$unpaid".$sep;
      }
      elseif ($new_data == "1") {
        $schema_insert .= "$paid".$sep;
      }
      else{
        $schema_insert .= "$new_data".$sep;
      }
    }
    else{
    $schema_insert .= "".$sep;
    }
  }
  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  }
?>