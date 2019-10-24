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

</head>
<body>
    <div class="topnav">
        <a href="/~levymaty/views/homepage.php">Home</a>
        <a href="/~levymaty/views/about.php">About Me</a>
        <a href="/~levymaty/views/whats_new.php">What's New</a>
        <a href="/~levymaty/views/gallery.php">Gallery</a>
        <a href="/~levymaty/views/git.php">Git</a>
        <a href="/~levymaty/views/contact.php">Contact</a>


        <div class="loginBox">
            <form id="formBox">
                    <input id="username" type="text" placeholder="Username">
                    <input id="password" type="password" placeholder="Password">
                    <button id="loginButton" type="submit">login</button>
            </form>

            <button id="signOut">Sign Out</button>
        </div>

    </div>
    

    <script src="/~levymaty/views/js/login.js"></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
</body> 



