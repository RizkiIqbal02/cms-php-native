<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        $title = 'Home';
        $content = 'Ini adalah halaman home';
        $this->render('home', compact('title', 'content'));
    }

    public function about()
    {
        echo "Ini adalah halaman about";
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
