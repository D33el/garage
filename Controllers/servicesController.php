<?php 

require_once realpath(__DIR__) . '/../bootstrap.php';
require_once APP_PATH .('/Models/service.php');
require_once APP_PATH .('/DataBase/DB.php');


class servicesController
{


 public function addService(){
  // $LastId = service::getLastInsertId()

  $nom = 'files/img'; // Le nom du répertoire à créer  
  $Img='';
  $fileName = $_FILES['imageService']['name'];
     if(move_uploaded_file($_FILES['imageService']['tmp_name'],$nom.'/'.$fileName)){
       //echo'fichier envoyé avec succé';
      }else{
      //echo'fichier non envoyer';
     }
   $Img=$nom.'/'.$_FILES['imageService']['name'];

   $id = general::get("services","id_service");

  $data = array(
   'id_service' => ++$id,
   'service' => $_POST['service'],
   'imageService' => $Img,
   'description' => $_POST['description'],
   'id_utilis' => $_SESSION['id_user']
  );
  $success = general::insert("services",$data);
  if($success){
   // successfull insert
  }else{
   // unsuccessfull insert
  }
 }

 public function updateService(){
  $id =$_POST['id_service'];

   $data = array(
    'service'=>$_POST['service'],
    'description'=>$_POST['description'],
   );

// Image treatment

if (!empty($_FILES['imageService']['name'])){
                
     $nom = 'files/img'; // Le nom du répertoire à créer
     $Img='';
     $fileName = $_FILES['imageService']['name'];
           if(move_uploaded_file($_FILES['imageService']['tmp_name'],$nom.'/'.$fileName)){
            //echo'fichier envoyé avec succé';
           }else{
           //echo'fichier non envoyer';
          }
        $Img=$nom.'/'.$_FILES['imageService']['name'];

     $data['imageService'] = $Img;    
}

$success = general::update("services",$data,"id_service=$id");
if($success){
 // successfull update
}else{
 // unsuccessfull update
}

}

 public function getAllServices(){
  $id = null;
  $services = service::getAllServices($id);
  return $services;
 }

 public function deleteService(){
  $id = $_POST['id_'];
  general::delete("services","id_service",$id);
 }



}

if(isset($_POST['action'])){
  $action = $_POST['action'];
  $id = $_POST['id'];
  // echo $id;
  if($action == "getService"){
    $result = service::getAllServices($id);
    $result = json_encode($result);
    echo $result;
  }
}

?>