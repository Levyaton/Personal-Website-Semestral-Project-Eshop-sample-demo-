<link 
	rel = "stylesheet"
	type = "text/css"
	href = "/~levymaty/css/formBox.css"
	/>


		<?php
			if (isSet($_SESSION["loggedin"])) {
                    echo '
                    <div id="loggedin">

                         <form id = "themeSelect" style = "display: none" action="/~levymaty/api/changeTheme.php" method="post">
                              <input type="text" name="num" placeholder="1" id="num" required> 
                              <input type="text" name="link" placeholder="'.$_SERVER['REQUEST_URI'].'" id="link" value="'.$_SERVER['REQUEST_URI'].'" style="display:none" required> 
                              <input type="text" name="userName" placeholder="'.$_SESSION["name"].'" id="userName" value="'.$_SESSION["name"].'" required> 
                              <input type="submit" id ="send" value="Login" class="buttons">
                         </form> 

                         <form id = "login" action="/~levymaty/api/logout.php" method="post">
                              <div id = "userBlock">
                              <input type="text" name="link" placeholder="'.$_SERVER['REQUEST_URI'].'" id="link" value="'.$_SERVER['REQUEST_URI'].'" style="display:none" required> 
                                   <a id = "user" onclick="nameClick()">' . $_SESSION["name"]. '</a>
                                   <div id = "themes" class= "themes" style = "visibility: hidden">
                                        <a id = "Levyaton" onClick="themeSelect(1)"> Levyaton </a>
                                        <a id = "Notayvel" onClick="themeSelect(2)"> Notayvel </a>
                                   </div>
                              </div>
                              
                            

                              <button type="submit" id ="logout" type="button">logout</button>
                         </form>
                    </div>
                    <script>

                         function nameClick(){
                              console.log("Clicked Name ");
                              const themes = document.getElementById("themes");
                              if( themes.style.visibility == "visible"){
                                   themes.style.visibility = "hidden";
                              }
                              else{
                                   themes.style.visibility = "visible";
                              }
                             
                         };

                         function themeSelect(num){
                              const themeSubmit = document.getElementById("num");
                              const submit = document.getElementById("send");
                              themeSubmit.value = num;
                              submit.click();
                         };

                    </script>
                   
                    
				';
			} else {
                    if($_SERVER['REQUEST_URI'] != '/~levymaty/register'){
                         echo '
                         <div id="formBox">
                         <form id = "login" action="/~levymaty/api/authenticate.php" method="post" onSubmit="return validateInput()">
                              <input type="text" name="username" placeholder="Username" id="username" minLenght="5" required>
                              <div class= "passwordBlock">
                                   <input type="password" name="password" placeholder="Password" id="password" required>
                              </div>
                              <input type="text" name="link" placeholder="'.$_SERVER['REQUEST_URI'].'" id="link" value="'.$_SERVER['REQUEST_URI'].'" style="display:none" required> 
                              
                              <input type="submit" value="Login" class="buttons">
                         </form>
                          <a id = "register" href="/~levymaty/register">Register</a>
                          </div>
                         ';
                    }
                   
			}
		?>

<script>

          
          function ThemeSelect() {
               
          }

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
