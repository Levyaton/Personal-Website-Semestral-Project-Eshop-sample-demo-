<?php

    $link = "http://".$_SERVER['SERVER_NAME']."/~levymaty/bikegallery/models/db.json";
    $file = file_get_contents($link);
    
   
    echo $file;
    //echo "Testin Pufik";
    exit();
    
?>