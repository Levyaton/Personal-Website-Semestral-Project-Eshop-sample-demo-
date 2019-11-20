<?php
    $request = $_POST["imageType"];
    $path =__DIR__ . '/..'. '/assets/'.$request;
    $files = scandir($path);
    $result = json_encode($arr)."\n";
    echo $result;
?>