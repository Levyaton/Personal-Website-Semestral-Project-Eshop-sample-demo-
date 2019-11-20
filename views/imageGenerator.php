<?php
	function getImagesFromFolder($filepath) {
        $files = scandir($filepath);
        foreach($files as $file) {
            echo '
            <div class="container">
                <p>'.$file.'</p>;
            </div>
            ';
          }
    }
    //<img src="'.$filepath.$file.'" alt="sometext"/>
    //<p>'.substr($filen, 0 , (strrpos($file, "."))).'</p>
?>