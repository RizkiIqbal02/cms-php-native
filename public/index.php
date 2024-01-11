<?php

use App\Controllers\HomeController;
use App\Controllers\RegisterController;

$uri = $_SERVER['REQUEST_URI'];

switch ($uri) {
    case '/':
        // require '../resources/views/home.php';
        require '../app/Controllers/HomeController.php';
        $home = new HomeController;
        $home->index();
        break;
    case '/about':
        require '../app/Controllers/HomeController.php';
        $home = new HomeController;
        $home->about();
        break;
    case '/register':
        require '../app/Controllers/RegisterController.php';
        $home = new RegisterController;
        $home->index();
        break;
    default:
        http_response_code(404);
        echo "404 Not Found";
}
