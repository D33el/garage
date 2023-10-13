<?php 

class general
{

 
 static Public function add($tableName,$data){
  $db = DB::connect();
  $colonnes = implode(", ", array_keys($data));
  $valeurs = "'" . implode("', '", $data) . "'";
  $sql = "INSERT INTO $tableName ($colonnes) VALUES ($valeurs)";
  $stmt = $db->prepare($sql);
  if($stmt->execute()){
   return 1;
  }else{
   return 0;
  }
 }

}

?>