<?php

namespace App\Models;

require_once __DIR__ . '/../Config/Database.php';

use App\Config\Database;

class User
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM users";
        $result = $this->db->query($sql);
        return $result->fetchAll(MYSQLI_ASSOC);
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = $this->db->query($sql);
        return $result->fetch(MYSQLI_ASSOC);
    }

    public function createUser($data)
    {
        try {
            //code...
            $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("sss", $data['name'], $data['email'], $data['password']);
            $stmt->execute();
            $stmt->close();
        } catch (\Throwable $th) {
            //throw $th;
            echo "<h1>" . $th->getMessage() . "</h1>";
        }
    }

    public function updateUser($data)
    {
        $sql = "UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sssi", $data['name'], $data['email'], $data['password'], $data['id']);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE id = $id";
        $this->db->query($sql);
    }

    public function login($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = 'XXXXXXXXX'";
        $result = $this->db->query($sql);
        return $result->fetch(MYSQLI_ASSOC);
    }
}
