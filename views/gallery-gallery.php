<!DOCTYPE html>
<?php
	session_start();
?>
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
</head>

<?php
	include ('navbar.php');
?>


<div class="content" style="padding-left:16px">
	
	<div class="row">
		<div class="img-with-text">
			<img src="/~levymaty/assets/file.png" alt="sometext" />
			<p>My art</p>
		</div>
		
		<div class="img-with-text">
			<img src="/~levymaty/assets/file.png" alt="sometext" />
			<p>Fanart</p>
		</div>
	</div>
</div>


<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
</body>
</html>