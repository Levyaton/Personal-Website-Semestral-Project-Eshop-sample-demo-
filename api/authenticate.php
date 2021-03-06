<?php
session_start();
 ob_start();
include "../models/db.php";

/*
Api is in charge of comparing user information from db with the given credentials, provided by the client
*/

/*
Check that the needed credentials were really provided
*/
if ( !isset($_POST["username"], $_POST["password"]) ) {
	session_regenerate_id();
		$_SESSION['loginTry'] = htmlspecialchars($_POST["username"]);
	die ('Please fill both the username and password field!');
}

/*
Querries the db for a user with a matching username as the one provided by the client and stores their id, username and theme in session variables, 
if the password was the same as the one in the users stored db entry
*/
if ($stmt = $con->prepare('SELECT id, password, theme FROM users WHERE username = ?')) {

	$stmt->bind_param('s', $_POST["username"]);
	$stmt->execute();
	
	$stmt->store_result();
}
if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password, $theme);
	$stmt->fetch();


	if (password_verify(htmlspecialchars($_POST["password"]), $password)) {
	
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = htmlspecialchars($_POST["username"]);
		$_SESSION['id'] = $id;
		$_SESSION['theme'] = $theme;
		//echo 'Welcome ' . $_SESSION['name'] . '!';
		$link = htmlspecialchars($_POST["link"]);
		if(isSet($_SESSION['loginTry'])){
			unset($_SESSION['loginTry']);
		}
		if(isSet($_SESSION['regUser'])){
			unset($_SESSION['regUser']);
		}
		if(isSet($_SESSION['regEmail'])){
			unset($_SESSION['regEmail']);
		}
		header("Location: ".$link."");
	} else {
		//echo 'Incorrect password!';
		session_regenerate_id();
		$_SESSION['loginTry'] = htmlspecialchars($_POST["username"]);
		$link = htmlspecialchars($_POST["link"]);
		header("Location: ".$link."");
	}
} else {
	//echo 'Incorrect username!';
	session_regenerate_id();
		$_SESSION['loginTry'] = htmlspecialchars($_POST["username"]);
	$link = htmlspecialchars($_POST["link"]);
		header("Location: ".$link."");
}
$stmt->close();


/*
Querries the db for a user with a matching email as the one provided by the client and stores their id, username and theme in session variables, 
if the password was the same as the one in the users stored db entry
*/
if ($stmt = $con->prepare('SELECT id, password, username, theme FROM users WHERE email = ?')) {

	$stmt->bind_param('s', $_POST["username"]);
	$stmt->execute();

	$stmt->store_result();
}
//echo "found ". $stmt->num_rows . " rows";
if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password, $username, $theme);
	$stmt->fetch();

	if (password_verify(htmlspecialchars($_POST["password"]), $password)) {
	
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = htmlspecialchars($username);
		$_SESSION['id'] = $id;
		$_SESSION['theme'] = $theme;
		//echo 'Welcome ' . $_SESSION['name'] . '!';
		$link = htmlspecialchars($_POST["link"]);
		if(isSet($_SESSION['loginTry'])){
			unset($_SESSION['loginTry']);
		}
		if(isSet($_SESSION['regUser'])){
			unset($_SESSION['regUser']);
		}
		if(isSet($_SESSION['regEmail'])){
			unset($_SESSION['regEmail']);
		}
		header("Location: ".$link."");
	} else {
		//echo 'Incorrect password!';
		session_regenerate_id();
		$_SESSION['loginTry'] = htmlspecialchars($_POST["username"]);
		$link = htmlspecialchars($_POST["link"]);
		header("Location: ".$link."");
	}
} else {
	//echo 'Incorrect username!';
	session_regenerate_id();
		$_SESSION['loginTry'] = htmlspecialchars($_POST["username"]);
	$link = htmlspecialchars($_POST["link"]);
		header("Location: ".$link."");
}
$stmt->close();

?>