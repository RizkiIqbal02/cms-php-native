<?php

namespace App\Controllers;

require_once __DIR__ . '/../Models/User.php';

use App\Models\User;

class HomeController
{
    public static function index()
    {
        // $user = new User();
        // $userdin = $user->where('name', 'Rizki Iqbal Muladi');
        // print_r($userdin);
        // die();
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
