<?php

session_start();

$DATABASE_HOST = "";
$DATABASE_USER = "";
$DATABASE_PASS = '';
$DATABASE_NAME = '';

$link = htmlspecialchars($_SERVER['SERVER_NAME']);
echo $link;
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
// Try and connect using the info above.
$conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = htmlspecialchars($_POST["userName"]);
$chosenTheme = htmlspecialchars($_POST["num"]);
$link = htmlspecialchars($_POST["link"]);
if ( $chosenTheme != 1 && $chosenTheme != 2) {
	die ('Please enter 1 or 2');
}

var_dump($_SESSION);
#$query = "UPDATE 'users' SET 'theme' = '".$chosenTheme."' WHERE 'users'.'id' = ".$_SESSION['theme'].";";
$sql = "UPDATE `users` SET `theme` = '".$chosenTheme."' WHERE `users`.`username` = '".$_SESSION['name']."'";

if ($conn->query($sql) === TRUE) {
    $_SESSION['theme'] = $chosenTheme;
    echo "Record updated successfully";
    $conn->close();
    header("Location: ".$link."");
} else {
   # $error = mysql_error();
    
   # echo "<script>console.log('Error updating record: ' + ' ".$conn->error."');</script>";
    echo "Error updating record: " . $conn->error;
    $conn->close();
    #header("Location: "."404.com");
    header("Location: ".$link."");
}

?>