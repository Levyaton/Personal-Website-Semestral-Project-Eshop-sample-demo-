<?php
    session_start();
    ob_start();
    
    $DATABASE_HOST = "";
    $DATABASE_USER = "";
    $DATABASE_PASS = '';
    $DATABASE_NAME = '';
    
    $link = htmlspecialchars($_SERVER['SERVER_NAME']);
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
    echo $link;
    echo $DATABASE_HOST;
    echo $DATABASE_USER;
    echo $DATABASE_PASS;
    echo $DATABASE_NAME;

    // Try and connect using the info above.
    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if ( mysqli_connect_errno() ) {
        // If there is an error with the connection, stop the script and display the error.
        die ('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    ?>
    
