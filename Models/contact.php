<?php

class contact
{


static public function getAll(){
 $db = DB::connect();
 $sql = "SELECT * FROM contact ";
 $stmt = $db->prepare($sql);
 if($stmt->execute()){
  return $stmt->fetchAll();
 }else{
  return 0;
 }
}

}
?>