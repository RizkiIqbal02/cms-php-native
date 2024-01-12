<?php

namespace App\Models;

require_once __DIR__ . '/../Config/Database.php';

use App\Config\Database;

class CRUDBaseModel
{
    protected $db;
    protected $table;

    public function __construct($table)
    {
        $this->db = (new Database())->getConnection();
        $this->table = $table;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM " . $this->table;
        $result = $this->db->query($sql);
        return $result->fetchAll(MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = $id";
        $result = $this->db->query($sql);
        return $result->fetch(MYSQLI_ASSOC);
    }

    public function create($data)
    {
        try {
            //code...
            $sql = "INSERT INTO " . $this->table . " (name, email, password) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("sss", $data['name'], $data['email'], $data['password']);
            $stmt->execute();
            $stmt->close();
        } catch (\Throwable $th) {
            //throw $th;
            header('Location: /error?message=' . urlencode($th->getMessage()));
            exit();
        }
    }

    public function update($data)
    {
        $sql = "UPDATE " . $this->table . " SET name = ?, email = ?, password = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sssi", $data['name'], $data['email'], $data['password'], $data['id']);
        $stmt->execute();
        $stmt->close();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE id = $id";
        $this->db->query($sql);
    }

    public function where($column, $value)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE $column = '$value'";
        $result = $this->db->query($sql);
        return $result->fetchAll(MYSQLI_ASSOC);
    }
}
