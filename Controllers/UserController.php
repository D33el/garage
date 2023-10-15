<?php

class UserController
{

 Public function Auth(){
  $data["username"] = $_POST['username'];
  $res = User::Login($data);

  if(!$res){
   header('Location: ' . APP_PROTOCOL.'://'.$_SERVER['HTTP_HOST']."/Login");
  }else{
    if($res->type == "Admin"){
     if(password_verify($_POST['Password'], $res->Password)){
      $_SESSION['logged'] = true;
      $_SESSION['id_user'] = $res->id_user;
      $_SESSION['nomPrenom'] = $res->nomPrenom;
      $_SESSION['email'] = $res->email;
      $_SESSION['username'] = $res->username;
      $_SESSION['type'] = $res->type;
      header('Location: ' . APP_PROTOCOL.'://'.$_SERVER['HTTP_HOST']."/dashboard");
     }else{
      // wrong password
     }

    }else if($res->type == "employe"){
     if(password_verify($_POST['Password'], $res->Password)){
      $_SESSION['logged'] = true;
      $_SESSION['id_user'] = $res->id_user;
      $_SESSION['nomPrenom'] = $res->nomPrenom;
      $_SESSION['email'] = $res->email;
      $_SESSION['username'] = $res->username;
      $_SESSION['type'] = $res->type;
      header('Location: ' . APP_PROTOCOL.'://'.$_SERVER['HTTP_HOST']."/dashboard");
     }else{
      // wrong password
     }
    }
  }

 }

 Public function Logout(){
  session_destroy();
  session_start();
  header('Location: ' . APP_PROTOCOL.'://'.$_SERVER['HTTP_HOST']."/home");
 }

 Public function addUser(){
  $id = general::get("utilis","id_utilis");
  $data = array(
    'id_utilis' => ++$id,
    'nomPrenom' => $_POST['nomPrenom'],
    'email' => $_POST['email'],
    'username' => $_POST['username'],
    'password' => $_POST['password'],
    'type' => $_POST['type']
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
    'password' => $_POST['password'],
    'type' => $_POST['type']
  );
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
  $id = $_POST['id_utilis'];
  $success = general::delete("utilis","id_utilis",$id);
  if($success){
    // successfull delete
  }else{
    // unsuccessfull delete
  }
 }

 Public function getAll(){
  return user::getAll();
 }

}

?>