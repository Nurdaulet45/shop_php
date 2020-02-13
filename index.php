<?php

// FRONT COTROLLER

// 1. Общие настройки

ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2. Подключение файлов системы
session_start();

define('ROOT', dirname(__FILE__));
require_once(ROOT .'/components/Autoload.php');
//require_once('components/Db.php');
//
// 3. Установка соединения с БД



// 4. Вызор Router

$router = new Router();
$router->run();

//$string = "Учебник по программир";
//$res = "/по/";
//var_dump(preg_match($res,$string));

?>
