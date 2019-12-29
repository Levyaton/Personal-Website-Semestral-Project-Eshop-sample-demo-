<?php
   session_start();
   #header("Location: http://localhost/~levymaty");
    echo '<p>GOT HERE</p>';
    $path =__DIR__ . '/..'. '/assets/fanart';
    $files = scandir($path);
    $fileName = "01".htmlspecialchars($_POST["fName"]);

    $tens = 0;
    $singles = 2;
    foreach (glob($path) as $fname) {
        $file = realpath($fname);
        $arrName = str_split($file);
        $replacement = array(0 => $tens, 1 => $singles);
        $arrName = array_replace($arrName,$replacement);
        rename($file, implode($arrName));
        $singles++;
        if($singles==10){
            $singles = 0;
            $tens++;
        }
    }

    $imageFile = $_FILES['imgFile']['name'];
    $ext = end((explode(".", $imageFile)));
    $finalName = $fileName.".".$ext;
    $dest = $path."/".$finalName;
    move_uploaded_file( $_FILES['imgFile']['name'], $target);
    header("Location: http://localhost/~levymaty/fanart");
?>