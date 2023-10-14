<?php 

class horairesController 
{

 public function SetHoraire(){
   $id = $_POST['id_horaire'];
   $data = array(
    'ouvertureMatin' => $_POST['ouvertureMatin'],
    'fermetureMatin' => $_POST['fermetureMatin'],
    'ouvertureAprem' => $_POST['ouvertureAprem'],
    'fermetureAprem' => $_POST['fermetureAprem'],
   );

   $success = general::update("horaires",$data,"id_horaire=$id");
   if($success){
    // successfull setting
   }else{
    // unsuccessfull setting
   }
 }

 public function getHoraire(){
  return horaire::get();
 }

}
?>