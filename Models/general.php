<?php 

class general
{

 
 static Public function insert($tableName,$data){
  $db = DB::connect();
  $colonnes = implode(", ", array_keys($data));
  $valeurs = "'" . implode("', '", $data) . "'";
  $sql = "INSERT INTO $tableName ($colonnes) VALUES ($valeurs)";
  echo $sql;
  $stmt = $db->prepare($sql);
  if($stmt->execute()){
   return 1;
  }else{
   return 0;
  }
 }


 static public function update($tableName, $data, $condition){
  // $db = DB::connect();
  $colonnes = implode(", ", array_keys($data));
  $valeurs = "'" . implode("', '", $data) . "'";
  $sql = "UPDATE $tableName SET ";
  foreach($data as $colonnes => $valeurs){
   $sql .= " $colonnes = '$valeurs' , ";
  }
  $sql = substr($sql, 0, -2);
  $sql .= " WHERE ".$condition;
  // $stmt = $db->prepare($sql);
  echo $sql;
  exit;
  // $stmt->execute();
 }

}

?>