<?php

class horaire
{
 
 static public function Set($data){
  $db = DB::connect();
  $query = "UPDATE horaires SET ouvertureMatin = :ouvertureMatin, fermetureMatin = :fermetureMatin
  , ouvertureAprem = :ouvertureAprem,  fermetureAprem = :fermetureAprem WHERE id_horaire = :id";
  $stmt = $db->prepare($query);
  $stmt->bindParam(':id', $data['id_horaire'], PDO::PARAM_STR);
  $stmt->bindParam(':ouvertureMatin', $data['ouvertureMatin'], PDO::PARAM_STR);
  $stmt->bindParam(':fermetureMatin', $data['fermetureMatin'], PDO::PARAM_STR);
  $stmt->bindParam(':ouvertureAprem', $data['ouvertureAprem'], PDO::PARAM_STR);
  $stmt->bindParam(':fermetureAprem', $data['fermetureAprem'], PDO::PARAM_STR);
  if($stmt->execute()){
   return 1;
  }else{
   return 0;
  }

 }

static public function get(){
 $db = DB::connect();
 $query = "SELECT * FROM horaires ";
 $stmt = $db->prepare($query);
 if($stmt->execute()){
  return $stmt->fetchAll();
 }else{
  return 0;
 }
}

}
?>