<?php

require_once realpath(__DIR__) . '/../bootstrap.php';
require_once APP_PATH .('/Models/user.php');
require_once APP_PATH .('/DataBase/DB.php');

class UserController
{

 Public function Auth(){
  $data["username"] = $_POST['username'];
  $res = User::Login($data);

  if(!$res){
   header('Location: ' . APP_PROTOCOL.'://'.$_SERVER['HTTP_HOST']."/login");
  }else{
    if($res->type == "admin"){
     if(password_verify($_POST['password'], $res->password)){
      $_SESSION['admin'] = true;
      $_SESSION['id_user'] = $res->id_utilis;
      $_SESSION['nomPrenom'] = $res->nomPrenom;
      $_SESSION['email'] = $res->email;
      $_SESSION['username'] = $res->username;
      $_SESSION['telephone'] = $res->tel;
      $_SESSION['type'] = $res->type;
      header('Location: ' . APP_PROTOCOL.'://'.$_SERVER['HTTP_HOST']."/dashboard-showroom");
     }else{
      // wrong password
     }

    }else if($res->type == "employe"){
     if(password_verify($_POST['password'], $res->password)){
      $_SESSION['employe'] = true;
      $_SESSION['id_user'] = $res->id_utilis;
      $_SESSION['nomPrenom'] = $res->nomPrenom;
      $_SESSION['email'] = $res->email;
      $_SESSION['username'] = $res->username;
      $_SESSION['type'] = $res->type;
      header('Location: ' . APP_PROTOCOL.'://'.$_SERVER['HTTP_HOST']."/dashboard-showroom");
     }else{
      // wrong password
     }
    }
  }

 }

 Public function Logout(){
  session_destroy();
  session_start();
  header('Location: ' . APP_PROTOCOL.'://'.$_SERVER['HTTP_HOST']."/login");
 }

 Public function addUser(){
  $id = general::get("utilis","id_utilis");
  $data = array(
    'id_utilis' => ++$id,
    'nomPrenom' => $_POST['nom']." ".$_POST['prenom'],
    'email' => $_POST['email'],
    'username' => $_POST['username'],
    'password' => password_hash($_POST['password'],PASSWORD_DEFAULT),
    'tel' => $_POST['tel'],
    'type' => 'employe'
  );
  $success = general::insert("utilis",$data);
  if($success == 1){
    // successfull insert
  }elseif($success == 0){
    // unsuccessfull insert
  }else{
    // Already exists
  }
 }

 Public function updateUser(){
   $id = $_POST['id_utilis'];
  $data = array(
    'nomPrenom' => $_POST['nomPrenom'],
    'email' => $_POST['email'],
    'username' => $_POST['username'],
    'tel' => $_POST['tel']
  );
  
  if($_POST['password']){
    $data['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);
  }

  $success = general::update("utilis",$data,"id_utilis=$id");
  if($success == 1){
    // successfull insert
  }elseif($success == 0){
    // unsuccessfull insert
  }else{
    // Already exists
  }
 }

 Public function deleteUser(){
  $id = $_POST['id_'];
  $success = general::delete("utilis","id_utilis",$id);
  if($success){
    // successfull delete
  }else{
    // unsuccessfull delete
  }
 }

 Public function getAll(){
  return user::getAll(null);
 }

}

if(isset($_POST['action'])){
  $action = $_POST['action'];
  $id = $_POST['id'];
  $result = user::getAll($id);
  $result = json_encode($result);
  echo $result;
}


?>