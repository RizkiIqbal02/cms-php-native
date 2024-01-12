<?php


namespace App\Controllers;

require_once __DIR__ . '/../Models/User.php';

use App\Models\User;

class LoginController
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $title = 'Login';
            $this->render('login', compact('title'));
        }

        // Menangani metode POST (memproses data formulir)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->processLogin();
        }
    }

    private function processLogin()
    {
        try {
            $users = new User(); // Ubah menjadi instance User model, bukan User controller
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $users->where('email', $email);

            // Periksa apakah password cocok
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                $_SESSION['isLogin'] = true;
                header('Location: /dashboard');
                exit;
            } else {
                // Jika login gagal, mungkin tampilkan pesan kesalahan atau alihkan ke halaman login
                header('Location: /login?error=1');
                exit;
            }
        } catch (\Throwable $th) {
            // Tangani kesalahan dan alihkan ke halaman error
            header('Location: /error?message=' . urlencode($th->getMessage()));
            exit();
        }
    }

    private function render($view, $data = [])
    {
        // Lakukan ekstraksi data agar bisa diakses dalam view
        extract($data);

        // Mulai buffering output
        ob_start();

        // Include view file
        include __DIR__ . '/../../resources/views/' . $view . '.php';

        // Ambil output dari buffer
        $content = ob_get_clean();

        // Tampilkan hasilnya
        echo $content;
    }
}
