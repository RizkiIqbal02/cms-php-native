<?php

namespace App\Controllers;

require_once __DIR__ . '/../Models/User.php';

use App\Models\User;

class RegisterController
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $title = 'Register';
            $this->render('register', compact('title'));
        }

        // Menangani metode POST (memproses data formulir)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->processRegistration();
        }
    }
    private function processRegistration()
    {
        try {

            $user = new User();
            $data = ['name' => $_POST['name'], 'email' => $_POST['email'], 'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)];
            $user->create($data);
            header('Location: /login');
        } catch (\Throwable $th) {
            header("Location: /error?message=" . urlencode($th->getMessage()));
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
