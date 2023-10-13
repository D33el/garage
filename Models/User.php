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

static public function add($data){
  $db = DB::connect();
  $queryCheck = "SELECT * FROM utilis WHERE email = " .$data['email']. " OR username = ".$data['username'];
  $stmt = $db->prepare($queryCheck);
  $stmt->execute()
  $resCheck = $stmt->fetchAll();
  if(!$resCheck){
    $query = "INSERT INTO utilis (nomPrenom, email, username, password, type) VALUES (:nomPrneom, :email, :username, :password, :type)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':nomPrenom', $data['nomPrenom'], PDO::PARAM_STR);
    $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
    $stmt->bindParam(':username', $data['username'], PDO::PARAM_STR);
    $stmt->bindParam(':password', $data['password'], PDO::PARAM_STR);
    $stmt->bindParam(':type', $data['type'], PDO::PARAM_STR);
    if($stmt->execute()){
      return 1;
    }else{
      return 0;
    }
  }else{
    return 'already exists';
  }


static public function update($data){
  $db = DB::connect();
  $query = "UPDATE utilis SET nomPrenom = :nomPrenom, email = :email, username = :username, password = :password, type = :type WHERE id_utilis = :id";
  $stmt = $db->prepare($query);
  $stmt->bindParam(':id', $data['id_utilis'], PDO::PARAM_STR);
  $stmt->bindParam(':nomPrenom', $data['nomPrenom'], PDO::PARAM_STR);
  $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
  $stmt->bindParam(':username', $data['username'], PDO::PARAM_STR);
  $stmt->bindParam(':password', $data['password'], PDO::PARAM_STR);
  $stmt->bindParam(':type', $data['type'], PDO::PARAM_STR);
  if($stmt->execute()){
    return 1;
  }else{
    return 0;
  }
}

}
?>