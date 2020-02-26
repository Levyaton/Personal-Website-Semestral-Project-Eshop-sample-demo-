<?php


    $link =__DIR__."/../models/db.json";
    
    $json = ',{"eventDate": "'.$_POST['eventDate'].'","Event_Name":"'.$_POST['Service'].'","Description": "'.$_POST['Description'].'","First_Name":"'.$_POST['First_Name'].'","Last_Name":"'.$_POST['Last_Name'].'","Email":"'.$_POST['Email'].'","Bike_Brand":"'.$_POST['Bike_Brand'].'","Bike_Type":"'.$_POST['Bike_Type'].'","Service":"'.$_POST['Service'].'","TimeStart":"'.$_POST['TimeStart'].'"}]';
    $file = file_get_contents($link);
    $jsonData = substr($file, 0, -1).$json;
    echo file_put_contents($link, $jsonData);

    header("Location: /~levymaty/bikegallery/views/homepage.php");
    exit()
   // echo "Be a dog";

?>