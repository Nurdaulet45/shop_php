<?php

spl_autoload_register(function ($class){
    $array_paths = array(
        '/models/',
        '/components/'
    );
    foreach ($array_paths as $path) {
        $path = ROOT . $path . $class . '.php';
        if (is_file($path)) {
            require $path;
        }
    }
});
/*
function __autoload($class_name){
    $array_paths = array(
        '/models/',
        '/components/'
    );

    foreach ($array_paths as $path) {
        $path = ROOT . $path . $class_name . 'php';
        if (is_file($path)){
            include_once $path;
        }

    }
}*/