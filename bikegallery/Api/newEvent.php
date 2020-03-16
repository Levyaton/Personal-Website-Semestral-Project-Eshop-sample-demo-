<?php
    
function RemoveSpecialChapr($value){
    $title = str_replace( array( '\'', '"', ',' , ';', '<', '>' ), '', $value);	
    return $title;
}

    $link =__DIR__."/../models/db.json";
    $time = RemoveSpecialChapr($_POST['TimeStart']);
    $realTime = substr($time,-5)." - ".substr($time,0,5);
    $service = "";
    foreach($_POST['Service'] as $selected){
       $service = $service.'{"eventName":"'.RemoveSpecialChapr($selected).'"},';
    }
    $service = substr($service,0,strlen($service)-1);
    $json = ',{"eventDate": "'.RemoveSpecialChapr($_POST['eventDate']).'","Description": "'.RemoveSpecialChapr($_POST['Description']).'","First_Name":"'.RemoveSpecialChapr($_POST['First_Name']).'","Last_Name":"'.RemoveSpecialChapr($_POST['Last_Name']).'","Email":"'.RemoveSpecialChapr($_POST['Email']).'","Bike_Brand":"'.RemoveSpecialChapr($_POST['Bike_Brand']).'","Bike_Type":"'.RemoveSpecialChapr($_POST['Bike_Type']).'","Service":['.$service.'],"TimeStart":"'.$realTime.'"}]';
    $file = file_get_contents($link);
    $jsonData = substr($file, 0, -1).$json;
    file_put_contents($link, $jsonData);

    header("Location: /~levymaty/bikegallery/views/homepage.php");
    exit()
   // echo "Be a dog";

?> 