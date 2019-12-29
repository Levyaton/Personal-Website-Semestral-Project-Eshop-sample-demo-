<?php
    echo '
    <div class="content" style="padding-left:16px">
        <div class="row">
    ';

            $files = scandir($path);
            $values = array_values($files);
            $images = "[";
            foreach($values as $file) {
                if($file != "." && $file != ".."){
                    $images = $images. $javascriptPath." + '".$file."',";
                    $image = $javascriptPath.$file.'"';
                    echo "
                    <div class='container'>
                        <img onclick=";
                        echo "'newMainImg(".$image.")' src= ".$image.'/>
                        <p>'.substr($file, 5 , -4).'</p>
                    </div>
                    ';
                }
            }  
            echo '
                </div>
                </div>
                <div id="overlay">
                    <img id = "mainImg" src = "/~levymaty/assets/myArt/03 - A date with a cat 03.png">
                    <div id="gallery" class="gallery">
            ';

            $images = substr($images, 0, -1);
            $images = $images."]";
            $end = 5;
            if(count($files,0) > 5){
                for ($i = 0; $i < $end; $i++) {
                    if($values[$i] == "." || $values[$i] == ".."){
                        $end++;
                    }
                    else{
                        echo '
                        <img id = "'.$i.'" class="galleryImg" src="/~levymaty/assets/myArt/'.$values[$i].'" alt="sometext" onclick="newMainImg(';
                        echo "'/~levymaty/assets/myArt/".$values[$i]."')".'"/>
                    ';
                    }
                }
                echo ' 
                        </div>
                    </div>
                ';
                
            }  

            elseif (count($files,0) > 0) {
                foreach($files as $file) {
                    if($file != "." && $file != ".."){
                        echo '
                    <img class="galleryImg" src="/~levymaty/assets/myArt/'.$file.'" alt="sometext" onclick="newMainImg(';
                    echo "'/~levymaty/assets/myArt/".$file."')".'"/>
                ';
                    }       
                }
                echo ' 
                </div>
            </div>
        ';
            }
        ?>

   

