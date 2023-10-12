<?php

class HomeController{
    public function index($page){
        include('front/'.$page.'.php'); 

    }
}

?>