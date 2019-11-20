<link 
	rel = "stylesheet"
	type = "text/css"
	href = "/~levymaty/css/formBox.css"
	/>


		<?php
			if (isSet($_SESSION["loggedin"])) {
                    echo '
                    <div id="loggedin">
                         <form id = "login" action="/~levymaty/api/logout.php" method="post">
                              <a id = "user">' . $_SESSION["name"]. '</a>
                              <button type="submit" id ="logout" type="button">logout</button>
                         </form>
                    </div>
				';
			} else {
                    echo '
                    <div id="formBox">
				<form id = "login" action="/~levymaty/api/authenticate.php" method="post" onSubmit="return validateInput()">
					<input type="text" name="username" placeholder="Username" id="username" required>
					<div class= "passwordBlock">
						<input type="password" name="password" placeholder="Password" id="password" required>
					</div>
					
					<input type="submit" value="Login" class="buttons">
                    </form>
                     <a id = "register" href="/~levymaty/register">Register</a>
                     </div>
				';
			}
		?>

<script>
           
            function validateInput() {
                const form = document.getElementById("login");
                const username = form.elements[0].value;
                const passblock = form.elements[1]
                const password = passblock.elements[0].value;

               console.log("Got to validateInput"); 
               if(username.length < 5 || username.length > 20){
                    alert("Username must be 5 - 20 characters long");
                    return false;
               }
               if(username.search(/[^a-zA-Z0-9\!\#\$\%\^\&\*\(\)\_\+]/) != -1){
                    alert("Please enter a valid username or email");
                    return false;
               }
               if(password.length < 10 || password.length > 25){
                    alert("Password must be 10 - 25 characters long");
                    return false;
               }
                
               if (password.search(/\d/) == -1 || password.search(/[a-zA-Z]/) == -1) {
                    alert("Password must contain letters and numbers");
                    return false;
               }
                if (password.search(/[^a-zA-Z0-9\!\@\#\$\%\^\&\*\(\)\_\+]/) != -1) {
                    alert("Password can't contain special characters");
                    return false;
                }
            }
            
</script>
