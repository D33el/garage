<?php

class voiture{

 // $db = DB::connect();

 Public function add($tableName,$data){
  $colonnes = implode(", ", array_keys($data));
  $valeurs = "'" . implode("', '", $data) . "'";
  $sql = "INSERT INTO $tableName ($colonnes) VALUES ($valeurs)";
  echo $sql;
  exit;
  // $stmt = $db->prepare($sql);
  $stmt->execute();

 }

 Public function update($data){

 }

 Public function delete($data){

 }

 Public function get($id){

 }


}
?>