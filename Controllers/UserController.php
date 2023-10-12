<?php

class UserController
{

 Public function Auth(){
  $data["username"] = $_POST['username'];
  $res = User::Login($data)

  if(!$res){
   header('Location: ' . APP_PROTOCOL.'://'.$_SERVER['HTTP_HOST']."/Login");
  }else{
    if($res->type == "Admin"){
     if($res->password = )

    }else if($res->type == "employe"){

    }
  }

 }

}

?>