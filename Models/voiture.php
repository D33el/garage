<?php


class voiture{

 Public function update($data){

 }

 Public function delete($data){

 }

 static Public function get($id,$random3){
  $db = DB::connect();
  $query = "SELECT * FROM voitures ";
  if($id){
   $query .= " WHERE id_voiture = $id";
  }else if($random3){
   $query .= " order by RAND() limit 3 ";
  }else{
   $query .= " ORDER by id_voiture desc";
  }
  $stmt = $db->prepare($query);
  $stmt->execute();
  return $stmt->fetchAll();
 }

 static public function filterShowroom($fromPrice, $toPrice, $annee, $boite, $carburant){
  $db = DB::connect();
  $sql = "SELECT * FROM voitures ";

   if($fromPrice || $toPrice || $annee || $boite || $carburant){
    $where = " WHERE ";   
   }else{
    $where = "";
   }

  $sql .= $where;

  if($fromPrice){
   $sql .= " prix >= $fromPrice AND ";
  }

  if($toPrice){
   $sql .= " prix <= $toPrice AND ";
  }

  if($annee){
   $sql .= " annee = $annee AND ";
  }

  if($boite){
   $sql .= " boite = $boite AND ";
  }

  if($carburant){
   $sql .= " carburant = $carburant AND ";
  }

  if($fromPrice || $toPrice || $annee || $boite || $carburant){
   $sql = substr($sql, 0, -5);
  }

  $sql .= " order by id_voiture desc";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  return $stmt->fetchAll();

}

}

if(isset($_POST['filterShowroom'])){
 $action = $_POST['filterShowroom'];
 $fromPrice = $_POST['fromPrice'];
 $toPrice = $_POST['toPrice'];
 $annee = $_POST['annee'];
 $boite = $_POST['boite'];
 $carburant = $_POST['carburant'];
 $result = voiture::filterShowroom($fromPrice, $toPrice, $annee, $boite, $carburant);
 $result = json_encode($result);
 echo $result;
}
?>