<?php

namespace App\Controllers;

class HomeController
{
    public static function index()
    {
        $title = 'Home';
        $content = 'Ini adalah halaman home';
        self::render('home', compact('title', 'content'));
    }

    public static function about()
    {
        $title = 'About';
        $content = 'Ini adalah halaman about';
        self::render('home', compact('title', 'content'));
    }

    private static function render($view, $data = [])
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
