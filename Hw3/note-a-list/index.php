<?php

$src_folder = 'src';

define('BASE_URL', dirname(__FILE__) . "/" . $src_folder);

require BASE_URL . '/configs/config.php';

if (isset($_GET['name_of_controller']) && isset($_GET['name_of_method'])) {
	$currentcontroller = trim($_GET['name_of_controller']);
	$name_of_method = trim($_GET['name_of_method']);
    require BASE_URL . '/controllers/'.$currentcontroller.".php";
    $controller = new $currentcontroller;
     $controller->$name_of_method();
} else {
     require BASE_URL . '/controllers/home.php';
    $controller = new Home();
    $controller->index();
}