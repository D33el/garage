<?php 

class general
{

 Public function add($tableName,$data){
  $colonnes = implode(", ", array_keys($data));
  $valeurs = "'" . implode("', '", $data) . "'";
  $sql = "INSERT INTO $tableName ($colonnes) VALUES ($valeurs)";
  $stmt = $db->prepare($sql);
  $stmt->execute();
 }

}

?>