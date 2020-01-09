<?php
session_start();

/*
   Api in charge of registering the client, by storing their credentials in a new entry of the db
*/

/*
    Db credentials variable names initialization
*/
$DATABASE_HOST = "";
$DATABASE_USER = "";
$DATABASE_PASS = '';
$DATABASE_NAME = '';

/*
    Converts special characters from the server name to html entities
*/

$link = htmlspecialchars($_SERVER['SERVER_NAME']);

/*
    Generates a string containing a link to the homepage
*/

$goTo = "http://".htmlspecialchars($_SERVER['SERVER_NAME'])."/~levymaty/";

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
    Ensures the needed credentials are available
*/  

if ( !isset($_POST["username"], $_POST["password"]) ) {
	die ('Please fill both the username and password field!');
}

/*
    Prepares our db for enjaction
*/

if ($stmt = $conn->prepare('SELECT id FROM users WHERE username = ?')) {
	$stmt->bind_param('s', $_POST["username"]);
	$stmt->execute();
	$stmt->store_result();
}
if($stmt2 =  $conn->prepare('SELECT id FROM users WHERE email = ?')){
    $stmt2->bind_param('s', $_POST["email"]);
	$stmt2->execute();
	$stmt2->store_result();
}

/*
    Ensures the username isn't already present in the db and if so, stores the user as a new entry in the db and loggs them in
*/

if ($stmt->num_rows > 0 || $stmt2->num_rows > 0) {
	$stmt->bind_result($id);
    $stmt->fetch();
    $stmt->close();
    header("Location: ".$goTo.""); 
}else{
    $stmt->close();
    $stmt2->close();
    $USERNAME = htmlspecialchars($_POST["username"]);
	$passwordFromPost = htmlspecialchars($_POST["password"]);
    $PASS = password_hash($passwordFromPost, PASSWORD_BCRYPT, [
		'cost' => 11,
	]);
    $EMAIL = htmlspecialchars($_POST["email"]);
    $sql = "INSERT INTO users (username, password, email) VALUES ('$USERNAME', '$PASS', '$EMAIL')";
    if ($conn->query($sql) === TRUE) {
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = htmlspecialchars($USERNAME);
        $conn->close();
    } else {
        error_log("Error: " . $sql . "<br>" . $conn->error);
        $conn->close();
    }
    header("Location: ".$goTo."");
}
?>