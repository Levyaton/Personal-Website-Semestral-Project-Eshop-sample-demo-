<?php

    $link = $_SERVER['DOCUMENT_ROOT']."/~levymaty/bikegallery/models/db.json";
    $file = file_get_contents($link);
    
   
    echo $file;
    //echo "Testin Pufik";
    exit();
    
?>