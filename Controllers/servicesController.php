<?php 

class serviceController
{


 public function addService(){
  // $LastId = service::getLastInsertId()

  $nom = 'files/img'; // Le nom du répertoire à créer  
  $Img='';
  $fileName = $_FILES['Img']['name'];
     if(move_uploaded_file($_FILES['Img']['tmp_name'],$nom.'/'.$fileName)){
       //echo'fichier envoyé avec succé';
      }else{
      //echo'fichier non envoyer';
     }
   $Img=$nom.'/'.$_FILES['Img']['name'];

  $data = array(
   'service' => $_POST['service'],
   'imageService' => $Img,
   'description' => $_POST['description'],
  );
  $success = service::add($data);
  if($success){
   // successfull insert
  }else{
   // unsuccessfull insert
  }
 }

 public function updateService(){

   $data = array(
    'id_service'=>$_POST['ID_Produit'],
    'service'=>$_POST['service'],
    'description'=>$_POST['description'],
   );

// Image treatment

if (!empty($_FILES['Img']['name'])){
                
     $nom = 'files/img'; // Le nom du répertoire à créer
     $Img='';
     $fileName = $_FILES['Img']['name'];
           if(move_uploaded_file($_FILES['Img']['tmp_name'],$nom.'/'.$fileName)){
            //echo'fichier envoyé avec succé';
           }else{
           //echo'fichier non envoyer';
          }
        $Img=$nom.'/'.$_FILES['Img']['name'];

     $data['Img'] = $Img;    
}

$success = service::update($data);
if($success){
 // successfull update
}else{
 // unsuccessfull update
}

}

 public function getAllServices(){
  $services = service::getAllServices();
  return $services;
 }



}


?>