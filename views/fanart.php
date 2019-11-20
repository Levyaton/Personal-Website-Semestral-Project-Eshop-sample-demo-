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
	href = "/~levymaty/css/dropzone.css"
    />
    <script src="/~levymaty/js/dropzone.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
    <?php
        $path =__DIR__ . '/..'. '/assets/fanart';
        $javascriptPath = '"/~levymaty/assets/fanart/';
        include ('navbar.php');
        include ('imageUpload.php');
        include ('imageGalleryBody.php');
        include ('imageGalleryScript.php');
    ?>


   
</body>
</html>

