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
	href = "/~levymaty/css/login.css"
    />

 
    <div class="topnav">
        <a href="/~levymaty/views/homepage.php">Home</a>
        <a href="/~levymaty/views/about.php">About Me</a>
        <a href="/~levymaty/views/whats_new.php">What's New</a>
        <a href="/~levymaty/views/gallery.php">Gallery</a>
        <a href="/~levymaty/views/git.php">Git</a>
        <a href="/~levymaty/views/contact.php">Contact</a>


         <div id="formBox">
        <?php

			if (isSet($_SESSION["loggedin"])) {
				echo '
				<form id = "login" action="/~levymaty/api/logout.php" method="post">
					<button type="submit" id ="logout" type="button">logout</button>
				</form>
				';
			} else {
				echo '
				<form id = "login" action="/~levymaty/api/authenticate.php" method="post">
					<input type="text" name="username" placeholder="Username" id="username" required>
					<input type="password" name="password" placeholder="Password" id="password" required>
					<input type="submit" value="Login">
				</form>
				';
			}
		?>
</div>

    </div>
    

    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>

</body> 



