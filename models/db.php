<?php
    
    /*
        Prepares a db connection
    */

    
    /*
        Db credentials variable names initialization
    */


    $DATABASE_HOST = "";
    $DATABASE_USER = "";
    $DATABASE_PASS = '';
    $DATABASE_NAME = '';
    

    /*
        Set's the db information, based on the server name
    */
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
    //echo $link;
    //echo $DATABASE_HOST;
    //echo $DATABASE_USER;
    //echo $DATABASE_PASS;
    //echo $DATABASE_NAME;

    /*
        Establishes db connection
    */
    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if ( mysqli_connect_errno() ) {
        die ('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
?>
    
