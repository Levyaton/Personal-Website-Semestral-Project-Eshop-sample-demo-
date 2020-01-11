<?php
	session_start();
	/*
    	Creates the 'Fanart' page
	*/
?>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 
	
	<?php
		/*
			Prepares variables needed for the imageGalleryBody code
		*/

        $path =__DIR__ . '/..'. '/assets/fanart';
		$javascriptPath = '"/~levymaty/assets/fanart/';

		/*
			Injects the code needed for the navigation bar
		*/
		include ('navbar.php');

		/*
			If the user is logged in, and the server name does not contain toad, injects the code needed for image uploading
		*/
		if(isSet($_SESSION["loggedin"])){
			if(!strpos(htmlspecialchars($_SERVER['SERVER_NAME']), "toad")){
				include ('uploadButton.php');
			}
		}

		/*
			Injects the code needed for the images in the 'fanart' folder to be displayed
		*/
		include ('imageGalleryBody.php');
		
		/*
			Injects the code needed for the image gallery to work correctly
		*/
		include ('imageGalleryScript.php');
		
	?>

</body>
</html>

