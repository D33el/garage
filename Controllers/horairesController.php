<?php 

class horairesController 
{

 public function SetHoraire(){
  $counter = $_POST['inputs'];
  for($i = 1;$i < $counter;$i++){
    $id = $_POST['id_horaire'.$i];
    
    $data = array(
      'ouvertureMatin' => $_POST['ouvertureMatin'.$i],
      'fermetureMatin' => $_POST['fermetureMatin'.$i],
      'ouvertureAprem' => $_POST['ouvertureAprem'.$i],
      'fermetureAprem' => $_POST['fermetureAprem'.$i],
     ); 
    general::update("horaires",$data,"id_horaire=$id");
  }
 }

 public function getHoraire(){
  return horaire::get();
 }

}
?>