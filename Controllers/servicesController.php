<?php 

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

  $data = array(
   'service' => $_POST['service'],
   'imageService' => $Img,
   'description' => $_POST['description'],
  );
  $success = general::add("services",$data);
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
  $id = 1;
  $services = service::getAllServices($id);
  return $services;
 }



}


?>