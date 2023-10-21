<?php

class contact
{



static public function getAll($id){
 $db = DB::connect();
 $sql = "SELECT * FROM contact ";
 if($id){
  $sql .= " WHERE id_voiture =$id";
 }else{
  $sql .= " order by id_contact desc";
 }
 $stmt = $db->prepare($sql);
 if($stmt->execute()){
  return $stmt->fetchAll();
 }else{
  return 0;
 }
}

static public function getRate($param){
 $db = DB::connect();
 $sql = "SELECT * FROM avis ";
 if($param){
  $sql .= " WHERE etat = 1";
 }
 $sql .= " order by id_avis desc";
 $stmt = $db->prepare($sql);
 $stmt->execute();
 return $stmt->fetchAll();
}

}
?>