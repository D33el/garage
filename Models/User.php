<?php 

class User{


 static Public Function Login($data){
  $db = DB::connect();
  $Username = $data['Username'];

  try{
      $query = 'SELECT * FROM users WHERE username=:username OR  email = :username';
      $stmt = $db->prepare($query);
      $stmt->execute(array(":username" => $Username));
      $user = $stmt->fetch(PDO::FETCH_OBJ);
      return $user;
  }catch(PDOException $ex){
      echo 'erreur' . $ex->getMessage(); 
    }
  }

}

?>