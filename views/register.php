<!DOCTYPE html>
<html>
<head>
    <link 
        rel = "stylesheet"
        type = "text/css"
        href = "/~levymaty/css/global.css"
        />

       
</head>
<body>

<?php
	include ('navbar.php');
?>

<form id = "registerForm" action="/~levymaty/api/register_user.php" method="post" onSubmit="return validateInput()">
                    <input type="text" name="username" placeholder="Username" id="username" required>
                    <input type="email" name="email" placeholder="example@email.com" id="email" required>
                    <input type="password" name="password" placeholder="Password" id="password" required>
                    <input type="password" name="password" placeholder="Password" id="doublecheckedPassword" required>
                    <input type="submit" value="Register">
</form>


<script>
           
            function validateInput() {
                const form = document.getElementById("registerForm");
                const username = form.elements[0].value;
                const email =  form.elements[1].value;
                const password = form.elements[2].value;
                const doublecheckedPassword = form.elements[3].value;

               console.log("Got to validateInput"); 
               if(username.length < 5 || username.length > 20){
                    alert("Username must be 5 - 20 characters long");
                    return false;
               }
               if(username.search(/[^a-zA-Z0-9\!\@\#\$\%\^\&\*\(\)\_\+]/) != -1){
                    alert("Username can't contain special characters");
                    return false;
               }
               if(username.search(/[^a-zA-Z0-9\!\@\#\$\%\^\&\*\(\)\_\+]/) != -1){
                    alert("Username can't contain special characters");
                    return false;
               }
               if(email.indexOf("@") == 0 || email.indexOf("@") == email.length - 1){
                    alert("Please enter a valid email adress");
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
                if(password != doublecheckedPassword){
                    alert("Passwords don't match");
                    return false;
                }
            }
            
</script>



</body>
</html>