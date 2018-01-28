<?php
namespace Library;
spl_autoload_register(function ($class) {
    $path = __DIR__ ."\\". $class . '.php';
    //echo $path;
    if (file_exists($path)) {
        require $path;
    } else {
        echo "Error";
    }
});