<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try{
    $conn = mysqli_connect("localhost", "root", "", "globe_ban");

    if(!$conn){
        echo "Connection failed: ".mysqli_connect_error();
    }
}catch(Exception $e){
   echo 'My error:'. $e->getMessage();
}
