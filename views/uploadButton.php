

<button id="uploadButton" onclick="document.getElementById('image-file').click();">Upload File</button>

<form enctype="multipart/form-data" action="/~levymaty/api/storeImg.php" method="post" id="uploadForm">
    <input id="image-file" name ="imgFile" type="file" accept="image/*" style="display: none"/>
    <input type="text" name="fname" placeholder="Username" id="fname" style="display: none">
    <input type="button" type="submit" style="display: none" id = "sub"></button>
</form>

<div id="overlayArea">
    <div id="border">
        <form id="fileUpload"  method="post">
            <img id="OAImage" src="/~levymaty/assets/levyaton.gif" alt="Levyaton">
            <input type="text" name="filename" placeholder="Username" id="fileName">
            <p id = "fileName"></p>
            <p id = "fileSize"></p>
            <div id = "CUButtons">
                <button id ="Cancel" type="button">Cancel</button>
                <button type="button" id = "OK">OK</button>
            </div>
        </form>
    </div>
</div>


<button id="resultShower">Result</button>

<script>
    const mb = 0.000001;
    const kb = 0.001;
    const button = document.getElementById("uploadButton");
    const imageFile = document.getElementById("image-file");
    const oa = document.getElementById("overlayArea");
    const oaImage = document.getElementById("OAImage");
    const oaFileSize = document.getElementById("fileSize");
    const oaFileName = document.getElementById("fileName");
    const ok = document.getElementById("OK");
    const cancel = document.getElementById("Cancel");
    const submitButton = document.getElementById("sub");
    const submitName = document.getElementById("fname");
    const form = document.getElementById("uploadForm");
    function generateFileSizeText(filesize){
        let size;
        if(filesize.toString().length > 5){
            size = (filesize*mb).toString() + " MB"
        }   
        else{
            size = (filesize*kb).toString() + " KB"
        }

        oaFileSize.innerText = size;
    }

    function exit() {
        oa.style.visibility = "hidden";
        button.style.visibility = "visible";
        imageFile.type = "file";
        imageFile.value = '';
    }  
   
    function generateFileName(filename) {
        const name = filename.substring(0,filename.lastIndexOf('.'));
        oaFileName.value = name;
    }


    cancel.addEventListener("click", function () {
        exit();
    });


    oa.addEventListener("click", function(e){ 
       console.log(e.target.class);
       if((e.target.id !== "OAImage") && (e.target.id !== "fileUpload") && (e.target.id !== "border")  && (e.target.id !== "fileSize")  && (e.target.id !== "fileName")  && (e.target.id !== "OK")){
        exit();
       }
    });

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        sendData();
    });

    ok.addEventListener("click", function(e){ 
        console.log("Hello ");
        if(oaFileName.value.length > 0){
            console.log("World");
            
            submitName.value = oaFileName.value;
            
            form.submit();
        }
       
    });
    imageFile.onchange = function (evt) {
        
        //button.innerText = imageFile.files[0].name;
        
        var selectedFile = event.target.files[0];
        var reader = new FileReader();

        
        reader.onload = function(evt) {
            oaImage.src = event.target.result;
            oaImage.title = selectedFile.name;
            oa.style.visibility = "visible";
            button.style.visibility = "hidden";
            generateFileSizeText(selectedFile.size);
            generateFileName(selectedFile.name);
        };


        reader.readAsDataURL(selectedFile);
    };

    function sendData(data) {
        const XHR = new XMLHttpRequest();

     
        const FD = new FormData(form);

       
        XHR.addEventListener("load", function(event) {
        alert(event.target.responseText);
        });

        
        XHR.addEventListener("error", function(event) {
        alert('Oops! Something went wrong.');
        });

      
        XHR.open("POST", "/~levymaty/api/storeImg.php");

     
        XHR.send(FD);
    };

  
    

</script>
