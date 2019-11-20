<?php
    $files = scandir($path);
    $files = array_slice($files, 2); 
    $result = json_encode($files)."\n";
    echo'
<script>
    const javascriptPath = '.$javascriptPath.'";
    const mainImg = document.getElementById("mainImg");
    const overlay = document.getElementById("overlay");
    const gallery = document.getElementById("gallery");
    const images = '.$result.';
    

    
    overlay.addEventListener("click", function(e){ 
        console.log(e.target.class);
       if((e.target.id !== "mainImg") && (e.target.id !== "gallery") && (e.target.className !== "galleryImg")){
            close();
       }
    });

    function onClickController(e) {
        console.log(e);
    }

    function close() {
        overlay.style.display = "none";
    }
    function newMainImg(mainImgFile) {
        console.log("The images are:"); 
        console.log(images); 
        console.log("The new main image is: " + mainImgFile); 
        overlay.style.display = "flex";
        mainImg.src = mainImgFile;
        console.log("images length is: " + images.length);
        if(images.length == 1){
            singleImageGallery(mainImgFile);
        }
        else if(images.length == 2){
            doubleImageGallery(mainImgFile);
        }
        else if(images.length == 3){
            tripleImageGallery(mainImgFile);
        }
        else if(images.length == 2){
            tetraleImageGallery(mainImgFile);
        }
        else{
            pentaImageGallery(mainImgFile);
        }
    }

    function singleImageGallery(mainImgFile){
        const first = gallery.childNodes[1];
        first.src = mainImgFile;
    }

    function doubleImageGallery(mainImgFile) {

        const first = gallery.childNodes[1];
        const second = gallery.childNodes[3];


        index = images.indexOf(mainImgFile);

        const firstN = mainImgFile;;
        const secondN = javascriptPath + images[mod(index + 1,images.length)];

        first.src = firstN;
        first.onclick = function(){ newMainImg(firstN);};
        
        second.src = secondN;
        second.onclick = function(){ newMainImg(secondN);};
        
    }

    function tripleImageGallery(mainImgFile){
        const first = gallery.childNodes[1];
        const second = gallery.childNodes[3];
        const third = gallery.childNodes[5];

        index = images.indexOf(mainImgFile);

        const firstN = javascriptPath + images[mod(index - 1,images.length)];
        const secondN = mainImgFile;
        const thirdN = javascriptPath + images[mod(index + 1,images.length)];

        first.src = firstN;
        first.onclick = function(){ newMainImg(firstN);};
        
        second.src = secondN;
        second.onclick = function(){ newMainImg(secondN);};
        
        third.src = thirdN;
        third.onclick = function(){ newMainImg(thirdN);};
        
    }
    function tetraleImageGallery(mainImgFile) {
        const first = gallery.childNodes[1];
        const second = gallery.childNodes[3];
        const third = gallery.childNodes[5];
        const fourth = gallery.childNodes[7];

        index = images.indexOf(mainImgFile);

        const firstN = javascriptPath + images[mod(index - 1,images.length)];
        const secondN = mainImgFile;
        const thirdN = javascriptPath + images[mod(index + 1,images.length)];
        const fourthN = javascriptPath + images[mod(index + 2,images.length)];

        first.src = firstN;
        first.onclick = function(){ newMainImg(firstN);};
        
        second.src = secondN;
        second.onclick = function(){ newMainImg(secondN);};
        
        third.src = thirdN;
        third.onclick = function(){ newMainImg(thirdN);};
        
        fourth.src = fourthN;
        fourth.onclick = function(){ newMainImg(fourthN);};
    }

    function pentaImageGallery(mainImgFile) {
        console.log("Got to pentaImageGallery");
        console.log("Now the new main image is: " + mainImgFile); 
       

        const first = gallery.childNodes[1];
        const second = gallery.childNodes[3];
        const third = gallery.childNodes[5];
        const fourth = gallery.childNodes[7];
        const fifth = gallery.childNodes[9];
        index = getGalleryIndex(mainImgFile);
        console.log("Gallery index is: " + index);

        const firstN = javascriptPath	 + images[mod(index - 2,images.length)];
        const secondN = javascriptPath	 + images[mod(index - 1,images.length)];
        const thirdN = mainImgFile;
        const fourthN = javascriptPath	 + images[mod(index + 1,images.length)];
        const fifthN = javascriptPath	 + images[mod(index + 2,images.length)];

        console.log("First index is: " + mod(index - 2,images.length));
        console.log("First name is: " + firstN);
        first.src = firstN;
        first.onclick = function(){ newMainImg(firstN);};
        
        console.log("Second index is: " + mod(index - 1,images.length));
        console.log("Second name is: " + secondN);
        second.src = secondN;
        second.onclick = function(){ newMainImg(secondN);};
        
        console.log("Third index is: " + index);
        console.log("Third name is: " + thirdN);
        third.src = thirdN;
        third.onclick = function(){ newMainImg(thirdN);};
        
        console.log("Fourth index is: " + mod(index + 1,images.length));
        console.log("Fourth name is: " + fourthN);
        fourth.src = fourthN;
        fourth.onclick = function(){ newMainImg(fourthN);};

        console.log("Fifth index is: " + mod(index + 2,images.length));
        console.log("Fifth name is: " + fifthN);
        fifth.src = fifthN;
        fifth.onclick = function(){ newMainImg(fifthN);};
    }

    function getGalleryIndex(imageName){
        console.log("Searching for: " + imageName );
        for (var i = 0; i < images.length; i++) {
            console.log(javascriptPath	 + imageName);
            if(imageName === javascriptPath	 + images[i]){
                return i;
            }
        }
        return null;
    }

    function mod(n, m) {
        return ((n % m) + m) % m;
    }

</script>
';?>