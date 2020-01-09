<?php
	session_start();
	/*
    	Creates the 'What's New' page
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
	href = "/~levymaty/css/whatsNew.css"
	/>
 

<?php
	/*
		Injects the code needed for the navigation bar
	*/
	include ('navbar.php');
?>

<div class='bodyContainer'>	
		<h1 class="title">Big Time!</h1>
		<article>
			<h3>Life is going great right now</h3>
			<p>I started a new job at this awesome company called juicymo. It is, like, 15 minutes from my house and the people there are rad!</p>
			<p>Not only have I started my career relativly early, school seems to be going great as well. Thanks to my job, I am learing how to program in Kotlin, work on apps and </p>
			<p>learnin new concepts, such as GitFlow, working with other threads, databases and proper programming syntax. These things will, and do, come in handy at school</p>
			<p>Meanwhile, school is teching me new types of programming, like this here website, made with css in html and soon, I hope, java script!</p>
			<p>Somehow, I even have a social life, hanging out with friends and going on dates with girls (Thanks Tinder! Any other age, I would probably die alone, thanks to yout, though, it seems I will not!).</p>
			<p>Indeed, things are good. Everything is working out. For now...</p>
</article>
</div>


<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
</body>
</html>