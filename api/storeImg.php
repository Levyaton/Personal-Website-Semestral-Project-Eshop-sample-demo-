<?php
   session_start();
   ini_set('display_errors',1);
error_reporting(E_ALL);
   #header("Location: http://localhost/~levymaty");
    $path =__DIR__ . '/..'. '/assets/fanart';
    $imageFile = $_FILES['imgFile']['name'];
    $tens = 0;
    $singles = 2;
    if ($handle = opendir($path)) {
        while (false !== ($fileName = readdir($handle))) {
            //$newName = str_replace("SKU#","",$fileName);
            if(strlen($fileName) > 2){
               // echo $fileName."\n";
                $newName = substr_replace($fileName,$tens.$singles,0,2);
                $replaced = str_replace("SKU#", $newName, $fileName);
                //echo $replaced;
                rename($path."/".$fileName, $path."/".$newName);
                //echo $fileName."\n";
                $singles++;
                if($singles==10){
                    $singles = 0;
                    $tens++;
                }
            }
            
        }
        closedir($handle);
    }
    $info = pathinfo($imageFile);
    $ext = $info['extension'];
    $newFileName =  "01 - ".htmlspecialchars($_SESSION["name"])." - ".htmlspecialchars($_POST["fname"]).".".htmlspecialchars($ext);

    if(move_uploaded_file( $_FILES['imgFile']['tmp_name'], $path."/".$newFileName)){
        echo 'works';
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
  

  // echo ($html_body);
}
header("Location: http://wa.toad.cz/~levymaty/fanart");
?>