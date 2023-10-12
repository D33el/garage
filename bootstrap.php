<?php

define('BASE_URL','http://127.0.0.1/');
define('APP_PATH', realpath(__DIR__));

if(isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS'])){
    define('APP_PROTOCOL', 'https');
}else{
    define('APP_PROTOCOL', 'http');
}
?>