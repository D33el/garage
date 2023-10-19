<?php

class contactController
{

Public function addContact($idvoiture){
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

 if($idvoiture){
  $data['id_voiture'] = $idvoiture;
 }
 $success = general::insert("contact",$data);
 if($success){
   return "successfull";
 }else{
   return "unsuccessfull";
 }
}



Public function rate(){
  $id = general::get("avis","id_avis");
  $data = array(
    'id_avis' => ++$id,
    'nom' => $_POST['nom']." ".$_POST['prenom'],
    'note' => $_POST['note'],
    'commentaire' => $_POST['commentaire'] 
  );
  $success = general::insert("avis",$data);
  if($success){
    
  }else{
    
  }
}

Public function getRatings($param){
  return contact::getRate($param);
}

Public function Valider(){
  $id = $_POST['id_avis'];
  $condition = "id_avis = $id";
  $data = array(
    'etat' => 1
  );
  general::update("avis",$data,$condition);
}

Public function getAllMessages(){
 return contact::getAll();
}

}
?>