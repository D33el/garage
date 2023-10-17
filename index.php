<?php
require_once './autoload.php';
require_once './bootstrap.php';


 

$home = new HomeController;

// echo "index called";

$pages=['home','showroom','car','login','dashboard-showroom',
'dashboard-messages','dashboard-comments','dashboard-website',
'dashboard-employees','todo'];

if(isset($_GET['page'])){
    if(in_array($_GET['page'],$pages)){
        $page = $_GET['page'];
            $home->index($page);
    }else{
        include('front/includes/404.php');
    }
}else{
    $home->index("home");
}

