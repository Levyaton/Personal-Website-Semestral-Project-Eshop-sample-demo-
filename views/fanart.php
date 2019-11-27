<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link 
	rel = "stylesheet"
	type = "text/css"
	href = "/~levymaty/css/global.css"
	/>
<link 
	rel = "stylesheet"
	type = "text/css"
	href = "/~levymaty/css/gallery-gallery.css"
    />
    
<link 
	rel = "stylesheet"
	type = "text/css"
	href = "/~levymaty/css/image.css"
    />
    
<link 
	rel = "stylesheet"
	type = "text/css"
	href = "/~levymaty/css/overlay.css"
    />


	<link 
	rel = "stylesheet"
	type = "text/css"
	href = "/~levymaty/css/fanart.css"
	/>

    <script src="/~levymaty/js/dropzone.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

<div id="file" class="dropzone-previews"></div>
	
    <?php
        $path =__DIR__ . '/..'. '/assets/fanart';
        $javascriptPath = '"/~levymaty/assets/fanart/';
		include ('navbar.php');
		if(isSet($_SESSION["loggedin"])){
			echo'
			
			<div id="overlayArea">
			<img id="dropImage" src="/~levymaty/assets/fileUpload.png">
			<form action="/file-upload"
			class="dropzone"
			id="my-awesome-dropzone">
			</form>
		</div>
		<button id="OCD" onClick="openClose()">Upload your fanart</button>
		
			';
		}
        include ('imageGalleryBody.php');
		include ('imageGalleryScript.php');
		
	?>
	
	

<script>
	function openClose() {
		const ova = document.getElementById("overlayArea");
		const button = document.getElementById("OCD");

		if(button.innerHTML=='Upload your fanart'){
			ova.style.visibility ='visible';
			button.innerHTML = "Close";
		}
		else if(button.innerHTML == "Close"){
			ova.style.visibility='hidden';
			button.innerHTML = "Upload your fanart";
		}
	}
</script>

</body>
</html>

