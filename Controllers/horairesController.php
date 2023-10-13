<?php 

class horairesController 
{

 public function SetHoraire(){
   $data = array(
    'id_horaire' => $_POST['id_horaire'],
    'ouvertureMatin' => $_POST['ouvertureMatin'],
    'fermetureMatin' => $_POST['fermetureMatin'],
    'ouvertureAprem' => $_POST['ouvertureAprem'],
    'fermetureAprem' => $_POST['fermetureAprem'],
   );

   $success = horaire::Set($data);
   if($success){
    // successfull setting
   }else{
    // unsuccessfull setting
   }
 }
}

?>