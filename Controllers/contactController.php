<?php

class contactController
{

Public function addContact(){
 $id = general::get("contact","id_contact");
 $Date = date("Y-m-d"); // Récupère la date au format "Année-Mois-Jour Heure:Minute:Seconde"

  $data = array(
  'id_contact' => ++$id,
  'nomPrenom' => $_POST['nom']." ".$_POST['prenom'],
  'email' => $_POST['email'],
  'telephone' => $_POST['telephone'],
  'sujet' => $_POST['sujet'],
  'message' => $_POST['message'],
  'createdat' => $Date
 );
 $success = general::insert("contact",$data);
 if($success){
   echo "successfull";
 }else{
   echo "unsuccessfull";
 }
}


Public function getContact(){

}

Public function rate(){
 $data = array(
  'nom' => $_POST['nom']." ".$_POST['prenom'],
  'note' => $_POST['note'],
  'commentaire' => $_POST['commentaire'] 
 );
 $success = general::insert("avis",$data);
 if($success){

 }else{

 }
}

Public function getAllMessages(){
 return contact::getAll();
}

}
?>