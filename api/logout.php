<?php
/*
   Api in charge of logging user out and ending their session
*/

/*
  Ensures that the session has started
*/
    if (!isset($_SESSION))
  {
    session_start();
  }

  /*
    Resets the session, so that the user is logged out and their credentials aren't available in the new one
  */
    session_destroy();
    session_start();
    unset ($_SESSION["loggedin"]);
    unset ($_SESSION['name']);
    unset ($_SESSION['id']);
    unset ($_SESSION['theme']);
    if(isSet($_SESSION['loginTry'])){
			unset($_SESSION['loginTry']);
		}
		if(isSet($_SESSION['regUser'])){
			unset($_SESSION['regUser']);
		}
		if(isSet($_SESSION['regEmail'])){
			unset($_SESSION['regEmail']);
		}
    $link = htmlspecialchars($_POST["link"]);
    header("Location: ".$link."");
?>