<?php 

require_once realpath(__DIR__) . '/../bootstrap.php';
require_once APP_PATH .('/DataBase/DB.php');


class service 
{

//  static public function add($data){
//   $db = DB::connect();
//   $query = `INSERT INTO services (service, imageSerivce, description)
//                          VALUES (:service, :imageService, :description) `;
//   $stmt = $db->prepare($query);
//   $stmt->bindParam(':service', $data['service'], PDO::PARAM_STR);
//   $stmt->bindParam(':imageService', $data['imageService'], PDO::PARAM_STR);
//   $stmt->bindParam(':description', $data['description'], PDO::PARAM_STR);

//   if($stmt->execute()){
//    return 1;
//   }else{
//    return 0;
//   }
//  }

 static public function update($data){
  $db = DB::connect();
  $query = "Update service SET service = :service, imageService = :imageService, description = :description ";
  
   // Image treatment
   $image = "";
   if (array_key_exists('Img', $data)) {
       $image = ", imageService = :Img";
       $query .= $image;
   }

  $query .= " WHERE id_service = :id_service ";
  $stmt = $db->prepare($query);
  $stmt->bindParam(':id_service', $data['id_service'], PDO::PARAM_STR);
  $stmt->bindParam(':service', $data['service'], PDO::PARAM_STR);
  $stmt->bindParam(':description', $description, PDO::PARAM_STR);
  if (array_key_exists('Img', $data)) {
   $stmt->bindParam(':Img', $data['Img'], PDO::PARAM_STR);
  }

  if($stmt->execute()){
   return 1;
  }else{
   return 0;
  }
 }


 static public function getAllServices($id){
  $db = DB::connect();
  $query = "SELECT * FROM services ";

  if($id){
   $query .= " WHERE id_service = :condition";
  }

  $stmt = $db->prepare($query);
  if($id){
   $stmt->bindParam(':condition', $id, PDO::PARAM_STR);
  }

  $stmt->execute();
  return $stmt->fetchAll();

 }

}
?>