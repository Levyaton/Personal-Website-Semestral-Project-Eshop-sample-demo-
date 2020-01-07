<?php
session_start();


$DATABASE_HOST = "";
$DATABASE_USER = "";
$DATABASE_PASS = '';
$DATABASE_NAME = '';

$link = htmlspecialchars($_SERVER['SERVER_NAME']);

$goTo = "http://".htmlspecialchars($_SERVER['SERVER_NAME'])."/~levymaty/";
//echo var_dump($_SERVER);
//echo $goTo;
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


// Change this to your connection info.
//  
if ( !isset($_POST["username"], $_POST["password"]) ) {
	// Could not get the data that should have been sent.
	die ('Please fill both the username and password field!');
}
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $conn->prepare('SELECT id FROM users WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST["username"]);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
}
if($stmt2 =  $conn->prepare('SELECT id FROM users WHERE email = ?')){
    $stmt2->bind_param('s', $_POST["email"]);
	$stmt2->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt2->store_result();
}

if ($stmt->num_rows > 0 || $stmt2->num_rows > 0) {
	$stmt->bind_result($id);
    $stmt->fetch();
    //echo '<script>console.log("This username is taken, please try again")</script>';
    //echo 'This username or email is already taken, please try again';
    $stmt->close();
    $link = htmlspecialchars($_POST["link"]);
    header("Location: ".$goTo.""); 
}else{
    $stmt->close();
    $stmt2->close();
    //echo '<script>console.log("This username is FREE, congrats")</script>';
    $USERNAME = htmlspecialchars($_POST["username"]);

	$passwordFromPost = htmlspecialchars($_POST["password"]);
    $PASS = password_hash($passwordFromPost, PASSWORD_BCRYPT, [
		'cost' => 11,
	]);
    $EMAIL = htmlspecialchars($_POST["email"]);
    $sql = "INSERT INTO users (username, password, email) VALUES ('$USERNAME', '$PASS', '$EMAIL')";
    if ($conn->query($sql) === TRUE) {
       // echo "New record created successfully";
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = htmlspecialchars($USERNAME);
        //echo 'Welcome ' . $_SESSION['name'] . '!';
        $stmt->close();
        $conn->close();
    } else {
        error_log("Error: " . $sql . "<br>" . $conn->error);
        //echo "Error: " . $sql . "<br>" . $conn->error;
        $stmt->close();
        $conn->close();
    }
    $link = htmlspecialchars($_POST["link"]);
    header("Location: ".$goTo."");
}
?>