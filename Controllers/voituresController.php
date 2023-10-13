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
 $success = voiture::add("voitures",$data);
 if($success){
  // successfull insert
 }else{
  // unsuccessfull insert
 }

}

Public function updateVoiture(){

}

Public function deleteVoiture(){

}

Public function getVoiture($id){

}




}
?>