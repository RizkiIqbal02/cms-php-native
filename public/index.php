<?php
session_start();
require '../app/Controllers/HomeController.php';
require '../app/Controllers/RegisterController.php';
require '../app/Controllers/LoginController.php';
require '../app/Controllers/DashboardController.php';

use App\Controllers\HomeController;
use App\Controllers\RegisterController;
use App\Controllers\LoginController;
use App\Controllers\DashboardController;

$uri = $_SERVER['REQUEST_URI'];
// $isLogin = $_SESSION['isLogin'];

switch ($uri) {
    case '/':
        HomeController::index();
        break;
    case '/about':
        if (isset($_SESSION['isLogin'])) {
            HomeController::about();
            break;
        } else {
            header('Location: /login');
            break;
        }
    case '/dashboard':
        if (isset($_SESSION['isLogin'])) {
            $home = new DashboardController();
            $home->index();
            break;
        } else {
            header('Location: /login');
            break;
        }
    case '/login':
        $home = new LoginController();
        $home->index();
        break;
    case '/register':
        $home = new RegisterController();
        $home->index();
        break;
    default:
        http_response_code(404);
        $segments = explode('/', $uri);

        // Hapus elemen kosong yang mungkin muncul karena karakter '/' di awal atau akhir URL
        $segments = array_filter($segments);

        // Print array dari setiap bagian path
        foreach ($segments as $segment) {
            echo $segment . '<br>';
        }
}
