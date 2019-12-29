<?php
    
$DATABASE_HOST = 'wa.toad.cz/adminer/';
$DATABASE_USER = 'levymaty';
$DATABASE_PASS = 'webove aplikace';
$DATABASE_NAME = 'userlist';
    // Try and connect using the info above.
    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if ( mysqli_connect_errno() ) {
        // If there is an error with the connection, stop the script and display the error.
        die ('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
