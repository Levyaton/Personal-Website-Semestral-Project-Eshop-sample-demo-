<?php
    if (!isset($_SESSION))
  {
    session_start();
  }
    session_destroy();
    session_start();
    unset ($_SESSION["loggedin"]);
    unset ($_SESSION['name']);
    unset ($_SESSION['id']);
    unset ($_SESSION['theme']);
    header("Location: http://wa.toad.cz/~levymaty/");