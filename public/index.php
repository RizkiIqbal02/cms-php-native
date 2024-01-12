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
        if (!isset($_SESSION['isLogin'])) {
            # code...
            $home = new LoginController();
            $home->index();
            break;
        } else {
            header('Location: /dashboard');
            break;
        }
    case '/register':
        if (!isset($_SESSION['isLogin'])) {
            # code...
            $home = new RegisterController();
            $home->index();
            break;
        } else {
            header('Location: /dashboard');
            break;
        }
    case '/logout':
        if (!isset($_SESSION['isLogin'])) {
            # code...
            header('Location: /login');
            break;
        } else {
            // remove all session variables
            session_unset();

            // destroy the session
            session_destroy();
            header('Location: /');
            break;
        }
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
