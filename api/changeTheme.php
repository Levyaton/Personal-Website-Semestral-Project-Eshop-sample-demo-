<?php
/*
    Api in charge of changing the users stored theme in their db entry
*/

session_start();


/*
    Db credentials variable names initialization
*/

$DATABASE_HOST = "";
$DATABASE_USER = "";
$DATABASE_PASS = '';
$DATABASE_NAME = '';

$link = htmlspecialchars($_SERVER['SERVER_NAME']);

/*
    Set's the db information, based on the server name
*/

if(strpos($link, "toad")){
    $DATABASE_HOST = '127.0.0.1';
    $DATABASE_USER = 'levymaty';
    $DATABASE_PASS = 'webove aplikace';
    $DATABASE_NAME = 'levymaty';
}
else{
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'userlist';
}

/*
    Establishes db connection
*/

$conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/*
    Converts special characters from the provided credentials to html entities
*/

$username = htmlspecialchars($_POST["userName"]);
$chosenTheme = htmlspecialchars($_POST["num"]);
$link = htmlspecialchars($_POST["link"]);

/*
    Ensures that the chosen theme is 1 or 2
*/

if ( $chosenTheme != 1 && $chosenTheme != 2) {
	die ('Please enter 1 or 2');
}


/*
    Finds the user entry in the db
*/
$username = htmlspecialchars($_SESSION['name']);

$sql = "UPDATE `users` SET `theme` = '".$chosenTheme."' WHERE `users`.`username` = '".$username."'";


/*
    Updates the users theme in db to be the selected one
*/

if ($conn->query($sql) === TRUE) {
    $_SESSION['theme'] = $chosenTheme;
    $conn->close();
    header("Location: ".$link."");
} else {
    $conn->close();
    header("Location: ".$link."");
}

?>