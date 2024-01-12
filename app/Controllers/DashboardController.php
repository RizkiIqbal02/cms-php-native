<?php


namespace App\Controllers;

require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Models/Post.php';

use App\Models\User;
use App\Models\Post;

class DashboardController
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $title = 'Dasboard';
            $query = new Post();
            $posts = $query->query('user_id', $_SESSION['user']['id']);
            $this->render('dashboard/index', compact('title', 'posts'));
        }

        // Menangani metode POST (memproses data formulir)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // $this->processLogin();
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $title = 'Create a new post';
            $this->render('dashboard/create', compact('title'));
        }

        // Menangani metode POST (memproses data formulir)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->store();
        }
    }

    public function store()
    {
        try {
            $post = new Post();
            $data = [
                'user_id' => $_POST['user_id'],
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'body' => $_POST['body'],
            ];
            $post->create($data);
            header('Location: /dashboard');
        } catch (\Throwable $th) {
            //throw $th;
            throw $th;
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
