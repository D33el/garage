<?php 

class general
{

 static public function get($tableName, $id){
  $db = DB::connect();
  $query = " SELECT MAX($id) as id FROM $tableName";
  // echo $query;
  $stmt = $db->prepare($query);
  $stmt->execute();
  $res = $stmt->fetch();
  return $res['id'];
 }

 static public function insert($tableName, $data) {
  $db = DB::connect();
  
  $colonnes = implode(", ", array_keys($data));
  $valeurs = ":" . implode(", :", array_keys($data));

  // Construction de la requête préparée
  $sql = "INSERT INTO $tableName ($colonnes) VALUES ($valeurs)";
  $stmt = $db->prepare($sql);
  // Liaison des valeurs avec les paramètres
  foreach ($data as $key => $value) {
      $stmt->bindValue(":$key", $value);
    }
    
// $stmt->execute();
// $stmt->debugDumpParams();
// exit;
//   Exécution de la requête préparée
  if ($stmt->execute()) {
      return 1;
  } else {
      return 0;
  }
}


 // static public function update($tableName, $data, $condition){
 //  $db = DB::connect();
 //  $colonnes = implode(", ", array_keys($data));
 //  $valeurs = "'" . implode("', '", $data) . "'";
 //  $sql = "UPDATE $tableName SET ";
 //  foreach($data as $colonnes => $valeurs){
 //   $sql .= " $colonnes = '$valeurs' , ";
 //  }
 //  $sql = substr($sql, 0, -2);
 //  $sql .= " WHERE ".$condition;
 //  $stmt = $db->prepare($sql);
 //  $stmt->execute();
 // }

 static public function update($tableName, $data, $condition) {
  $db = DB::connect();

  $colonnes = array_keys($data);
  $valeurs = array_values($data);

  $updateColumns = [];
  foreach ($colonnes as $col) {
      $updateColumns[] = "$col = :$col";
  }

  // Construction de la requête préparée
  $sql = "UPDATE $tableName SET " . implode(', ', $updateColumns) . " WHERE $condition";
  $stmt = $db->prepare($sql);

  // Liaison des valeurs avec les paramètres
  foreach ($data as $col => $value) {
      $stmt->bindValue(":$col", $value);
  }


  // Exécution de la requête préparée
  if($stmt->execute()){
   return 1;
  }else{
   return 0;
  }
  
}


static public function delete($tableName, $id, $valueId){
 $db = DB::connect();
 $sql = "DELETE FROM $tableName WHERE $id = $valueId ";
 $stmt = $db->prepare($sql);
 if($stmt->execute()){
  return 1;
 }else{
  return 0;
 }

}

}

?>