<?
$link = htmlspecialchars($_SERVER['REQUEST_URI']);
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

?>