<?php

class contactController
{

Public function addContact(){
 $data = array(
  'nomPrenom' => $_POST['nom']." ".$_POST['prenom'],
  'email' => $_POST['email'],
  'telephone' => $_POST['telephone'],
  'sujet' => $_POST['sujet'],
  'message' => $_POST['message']
 );
 $success = general::add("contact",$data);
 if($success){

 }else{

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
 $success = general::add("avis",$data);
 if($success){

 }else{

 }
}

}
?>