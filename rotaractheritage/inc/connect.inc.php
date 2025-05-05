<?php
class DB{
  private static function connect()
  {
    $pdo = new PDO("mysql:host=localhost;dbname=id8264027_project;charset=utf8", "id8264027_rahul", "Ratan_1234");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
  }
  public static function query($query, $params=array())
  {
    $statement= self::connect()->prepare($query);
    $statement->execute($params);
    if(explode(' ', $query)[0] == 'SELECT')
    {
      $data=$statement->fetchAll();
      return $data;
    }
  }
  public static function count($query)
  {
    $statement= self::connect()->prepare($query);
    $statement->execute();
    $count= $statement->columnCount();
    return $count;
  }
  public static function load($query){
    $run= self::connect()->query($query);
    $run->setFetchMode(PDO::FETCH_ASSOC);
    while($r = $run->fetchAll()){
      return $r;
    }
    
  }
}
?>
