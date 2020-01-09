<?php
	session_start();
	/*
    	Creates the 'Homepage' page
	*/
?>
<!DOCTYPE html>
<html>
<head>
	<link 
	rel = "stylesheet"
	type = "text/css"
	href = "/~levymaty/css/homepage.css"
	/>


<?php
	/*
		Injects the code needed for the navigation bar
	*/
	include ('navbar.php');
?>

<div class='bodyContainer'>		
	<h2>Welcome to the home page of Matthias Levy, The Deamon of Prague, Levyaton, MatyTheRed!</h2>
	<p>I hope you survive the experience ;-)</p>
	<img src="/~levymaty/assets/levyaton.gif" alt="Levyaton">

</div>



<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
</body>

</html>


