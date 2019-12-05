

<div class="topnav">
  <a href="/~levymaty/" <?php echo ($_SERVER['REQUEST_URI'] == '/~levymaty/') ? 'class="active"' : ''; ?> >Home</a>
  <a href="/~levymaty/about" <?php echo ($_SERVER['REQUEST_URI'] == '/~levymaty/about') ? 'class="active"' : ''; ?>>About Me</a>
  <a href="/~levymaty/whats_new" <?php echo ($_SERVER['REQUEST_URI'] == '/~levymaty/whats_new') ? 'class="active"' : '' ; ?>>What's New</a>
  <a href="/~levymaty/gallery" <?php echo ($_SERVER['REQUEST_URI'] == '/~levymaty/gallery' || $_SERVER['REQUEST_URI'] == '/~levymaty/gallery-gallery'  || $_SERVER['REQUEST_URI'] == '/~levymaty/videos'|| $_SERVER['REQUEST_URI'] == '/~levymaty/gallery-stories' || $_SERVER['REQUEST_URI'] == '/~levymaty/myArt' || $_SERVER['REQUEST_URI'] == '/~levymaty/fanart') ? 'class="active"' : '' ; ?>>Gallery</a>
  <a href="/~levymaty/git" <?php echo ($_SERVER['REQUEST_URI'] == '/~levymaty/git') ? 'class="active"' : '' ; ?>>Git</a>
  <a href="/~levymaty/contact" <?php echo ($_SERVER['REQUEST_URI'] == '/~levymaty/contact') ? 'class="active"' : ''  ; ?>>Contact</a>
  
  <?php include ('formBox.php'); ?>

</div>

<?php
  if(($_SERVER['REQUEST_URI'] ==  '/~levymaty/gallery-gallery') || ($_SERVER['REQUEST_URI'] ==  '/~levymaty/myArt') || ($_SERVER['REQUEST_URI'] ==  '/~levymaty/fanart' || ($_SERVER['REQUEST_URI'] ==  '/~levymaty/videos' ) || ($_SERVER['REQUEST_URI'] ==  '/~levymaty/gallery-stories') || ($_SERVER['REQUEST_URI'] ==  '/~levymaty/gallery'))){
    echo'
    <div class="sidenav">
      <ul>
        <li><a href="/~levymaty/gallery"';
        if($_SERVER['REQUEST_URI'] ==  '/~levymaty/gallery'){
          echo 'class="active"';
        }
        echo '>Intro</a></li>
    ';
    if(($_SERVER['REQUEST_URI'] ==  '/~levymaty/gallery-gallery') || ($_SERVER['REQUEST_URI'] ==  '/~levymaty/myArt') || ($_SERVER['REQUEST_URI'] ==  '/~levymaty/fanart')){
      echo  '<li><a href="/~levymaty/gallery-gallery"';
      if($_SERVER['REQUEST_URI'] ==  '/~levymaty/gallery-gallery'){
        echo'class="active"';
      }
      echo '>Image Gallery</a></li>
          <li><a href="/~levymaty/myArt"';
      if($_SERVER['REQUEST_URI'] ==  '/~levymaty/myArt'){
        echo 'class="active"';
      } 
      echo " class = 'sublist'>My art</a></li>
            <li><a href='/~levymaty/fanart'";
            if($_SERVER['REQUEST_URI'] ==  '/~levymaty/fanart'){
              echo 'class="active"';
            } 
            echo " class = 'sublist'>Fanart</a></li>";
    }
    else{
        echo '<li><a href="/~levymaty/gallery-gallery">Image Gallery</a></li>';
    }
    echo '<li><a href="/~levymaty/videos"';
    if($_SERVER['REQUEST_URI'] ==  "/~levymaty/videos"){
      echo 'class="active"';
    } 
    echo '>Videos</a></li>
    <li><a href="/~levymaty/gallery-stories"';
    if($_SERVER['REQUEST_URI'] ==  "/~levymaty/gallery-stories"){
      echo 'class="active"';
    } 
    echo '>Writing</a></li>';
  }
  echo '</div>';
?>


