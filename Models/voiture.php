<?php

class voiture{

 // $db = DB::connect();

 // Public function add($tableName,$data){
 //  $db = DB::connect();
 //  $colonnes = implode(", ", array_keys($data));
 //  $valeurs = "'" . implode("', '", $data) . "'";
 //  $sql = "INSERT INTO $tableName ($colonnes) VALUES ($valeurs)";
 //  $stmt = $db->prepare($sql);
 //  $stmt->execute();

 // }

 Public function update($data){

 }

 Public function delete($data){

 }

 static Public function get($id){
  $db = DB::connect();
  $query = "SELECT * FROM voitures ";
  if($id){
   $query .= " WHERE id_voiture = $id";
  }
  $query .= " ORDER by id_voiture desc";
  $stmt = $db->prepare($query);
  $stmt->execute();
  return $stmt->fetchAll();
 }


}
?>