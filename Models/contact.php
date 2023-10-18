<?php

class contact
{


static public function getAll(){
 $db = DB::connect();
 $sql = "SELECT * FROM contact ";
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
 $stmt = $db->prepare($sql);
 $stmt->execute();
 return $stmt->fetchAll();
}

}
?>