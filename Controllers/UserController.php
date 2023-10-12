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

}

?>