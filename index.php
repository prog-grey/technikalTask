<?php

// Font controller

// 1. Общие настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2. Подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Router.php');
require_once ROOT.'/components/Db.php';


// 4. Вызов Router
$router = new Router();
$router->run();
