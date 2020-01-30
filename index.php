<?php
    /*
		Chooses where to rederect the user
	*/
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
    case '/~levymaty/gallery' :
        require __DIR__ . '/views/gallery.php';
        break;
    case '/~levymaty/gallery-gallery' :
        require __DIR__ . '/views/gallery-gallery.php';
        break;
    case '/~levymaty/myArt' :
        require __DIR__ . '/views/myArt.php';
        break;
    case '/~levymaty/fanart' :
        require __DIR__ . '/views/fanart.php';
        break;
    case '/~levymaty/gallery-stories' :
        require __DIR__ . '/views/gallery-stories.php';
        break;
    case '/~levymaty/register' :
        require __DIR__ . '/views/register.php';
        break;
    case '/~levymaty/videos' :
        require __DIR__ . '/views/videos.php';
        break;
    case '/~levymaty/bikeGallery' :
        require __DIR__ . '/bikegallery/views/homepage.php';
    default: 
        require __DIR__ . '/views/404.html';
        break;
}
?>