<?php
   session_start();
   ini_set('display_errors',1);
   error_reporting(E_ALL);

   /*
      Api in charge of storing a provided image in the fanart folder
   */


   /*
      Prepares needed variables
   */
    $path =__DIR__ . '/..'. '/assets/fanart';
    $imageFile = $_FILES['imgFile']['name'];
    $tens = 0;
    $singles = 1;
    chmod($path, 0750);
    /*
      Renames the files present in the folder, so that the newst file can be 01 end every other one get's incremented after that
   */
   

   
    if ($handle = opendir($path)) {
        while (false !== ($fileName = readdir($handle))) {
            if(strlen($fileName) > 2){
               // $newName = substr_replace($fileName,$tens.$singles,0,2);
                //$replaced = str_replace("SKU#", $newName, $fileName); 
                //rename($path."/".$fileName, $path."/".$newName); 
                $singles++;
                if($singles==10){
                    $singles = 0;
                    $tens++;
                }
            }
            
        }
        closedir($handle);
    }

    /*
      Sotres the provided image in the fanart folder, with a modify name that contains the name of the user that provided it, as well as numbering the
      image as 01
   */

    $info = pathinfo($imageFile);
    $ext = $info['extension'];
    $newFileName = $tens.$singles." - ".htmlspecialchars($_SESSION["name"])." - ".htmlspecialchars($_POST["fname"]).".".htmlspecialchars($ext);
    if(move_uploaded_file( $_FILES['imgFile']['tmp_name'], $path."/".$newFileName)){
    }else {
        $html_body = '<h1>File upload error!</h1>';
   switch ($_FILES[0]['error']) {
   case 1:
      $html_body .= 'The file is bigger than this PHP installation allows';
      break;
   case 2:
      $html_body .= 'The file is bigger than this form allows';
      break;
   case 3:
      $html_body .= 'Only part of the file was uploaded';
      break;
   case 4:
      $html_body .= 'No file was uploaded';
      break;
   default:
      $html_body .= 'unknown errror';
   } 

}
$link = htmlspecialchars($_POST["link"]);
header("Location: ".$link."");
?>