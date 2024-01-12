<?php

namespace App\Models;

require_once __DIR__ . '/CRUDBaseModel.php';

use App\Models\CRUDBaseModel;

class User extends CRUDBaseModel
{
    public function __construct()
    {
        // Mengirimkan nama tabel 'users' ke constructor parent class CRUDBaseModel
        parent::__construct('users');
    }

    public function login($email, $password)
    {
        try {
            // Gunakan parameterized query
            $sql = "SELECT * FROM users WHERE email = ? LIMIT 1";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();

            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            // Periksa apakah password cocok
            if ($user && password_verify($password, $user['password'])) {
                return $user;
            } else {
                return null;
            }
        } catch (\Throwable $th) {
            // Tangani kesalahan dan alihkan ke halaman error
            header('Location: /error?message=' . urlencode($th->getMessage()));
            exit();
        }
    }
}
