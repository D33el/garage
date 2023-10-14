<?php


class voituresController{

Public function addVoiture(){

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
  'marque' => $_POST['marque'],
  'imageprincpale' => $Img,
  'couleur' => $_POST['couleur'],
  'kilometrage' => $_POST['kilometrage'],
  'etat' => $_POST['etat'],
  'moteur' => $_POST['moteur'],
  'carburant' => $_POST['carburant'],
  'observation' => $_POST['observation'],
  'prix' => $_POST['prix'],
  'annee' => $_POST['annee']
 );
 $success = general::insert("voitures",$data);
 if($success){
  // successfull insert
 }else{
  // unsuccessfull insert
 }

}

Public function addImage(){

  $nom = 'files/img'; // Le nom du répertoire à créer  
  $Img='';
  $fileName = $_FILES['image']['name'];
     if(move_uploaded_file($_FILES['image']['tmp_name'],$nom.'/'.$fileName)){
       //echo'fichier envoyé avec succé';
      }else{
      //echo'fichier non envoyer';
     }
   $Img=$nom.'/'.$_FILES['image']['name'];

  $data = array(
    'image' => $Img,
    'id_voiture' => $_POST['id_voiture']
  );
  $success = general::insert("imagesVoiture",$data);
  if($success){

  }else{
 
  }
}

Public function updateVoiture(){
  $id = $_POST['id_voiture'];

  $data = array(
    'marque' => $_POST['marque'],
    'couleur' => $_POST['couleur'],
    'kilometrage' => $_POST['kilometrage'],
    'etat' => $_POST['etat'],
    'moteur' => $_POST['moteur'],
    'carburant' => $_POST['carburant'],
    'observation' => $_POST['observation'],
    'prix' => $_POST['prix'],
    'annee' => $_POST['annee']
   );

   if (!empty($_FILES['imageprincpale']['name'])){
                
    $nom = 'files/img'; // Le nom du répertoire à créer
    $Img='';
    $fileName = $_FILES['imageprincpale']['name'];
          if(move_uploaded_file($_FILES['imageprincpale']['tmp_name'],$nom.'/'.$fileName)){
           //echo'fichier envoyé avec succé';
          }else{
          //echo'fichier non envoyer';
         }
       $Img=$nom.'/'.$_FILES['imageprincpale']['name'];

    $data['imageprincpale'] = $Img;    
}

   $success = general::update("voitures",$data,"id_voiture=$id");
   if($success){
    // successfull insert
   }else{
    // unsuccessfull insert
   }
}

Public function deleteVoiture(){

}

Public function getVoiture($id){

}




}
?>