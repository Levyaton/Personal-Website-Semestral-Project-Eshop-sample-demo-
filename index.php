<?php
switch ($_SERVER['REQUEST_URI']) {
    case '/~levymaty' :
        require __DIR__ . '/views/homepage.php';
        break;
    case '/~levymaty/' :
        require __DIR__ . '/views/homepage.php';
        break;
    case '/~levymaty/contact' :
        require __DIR__ . '/views/contact.php';
        break;
    case '/~levymaty/about' :
        require __DIR__ . '/views/about.php';
        break;
    case '/~levymaty/git' :
        require __DIR__ . '/views/git.php';
        break;
    case '/~levymaty/login' :
        require __DIR__ . '/views/login.php';
        break;
    case '/~levymaty/whats_new' :
        require __DIR__ . '/views/whats_new.php';
        break;
    case '/~levymaty/gallery-gallery' :
        require __DIR__ . '/views/gallery-gallery.php';
        break;
    case '/~levymaty/gallery-stories' :
        require __DIR__ . '/views/gallery-stories.php';
        break;
    
    default: 
        require __DIR__ . '/views/404.html';
        break;
}
?>