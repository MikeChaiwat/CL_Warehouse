<?php
    $host = "localhost";
    $user = "mike";
    $pass = "IR166LIieYZvSP5G";
    $database = "php_project";
    $db = new mysqli($host,$user,$pass,$database);
    if($db->connect_error){
        echo "Connect to database failed : ".$db->connect_error;
    }
    $db->set_charset("utf8");

?>