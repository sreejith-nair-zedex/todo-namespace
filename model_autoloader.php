<?php
spl_autoload_register("myAutoLoad");

function myAutoLoad($className){
    $path = "/";
    $extension = ".php";
    $full_path = $path . str_replace('\\', '/', $className) . $extension;
    echo $full_path;
    include_once $full_path;
}