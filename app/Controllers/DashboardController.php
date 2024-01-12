<?php


namespace App\Controllers;

require_once __DIR__ . '/../Models/User.php';

use App\Models\User;

class DashboardController
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $title = 'Dasboard';
            $this->render('dashboard', compact('title'));
        }

        // Menangani metode POST (memproses data formulir)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // $this->processLogin();
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
