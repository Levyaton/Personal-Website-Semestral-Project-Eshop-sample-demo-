<?php
    if(isSet($_SESSION["loggedin"])){
        echo '<form action="upload.php" class="dropzone"></form>';
    }
?>

