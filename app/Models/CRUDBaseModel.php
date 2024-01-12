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

    // public function create($data)
    // {
    //     try {
    //         //code...
    //         $sql = "INSERT INTO " . $this->table . " (name, email, password) VALUES (?, ?, ?)";
    //         $stmt = $this->db->prepare($sql);
    //         $stmt->bind_param("sss", $data['name'], $data['email'], $data['password']);
    //         $stmt->execute();
    //         $stmt->close();
    //     } catch (\Throwable $th) {
    //         //throw $th;
    //         header('Location: /error?message=' . urlencode($th->getMessage()));
    //         exit();
    //     }
    // }

    public function create($data)
    {
        try {
            // lest say $data = ['name' => 'John', 'age' => 25, 'city' => 'New York'];
            $columns = implode(', ', array_keys($data)); // maka isi $columns name, age, city
            $placeholders = implode(', ', array_fill(0, count($data), '?')); // $placeholder ?, ?, >
            //  array_fill untuk membuat array yang berisi sejumlah elemen sesuai dengan jumlah elemen dalam array $data, 
            // dan setiap elemennya diisi dengan tanda tanya (?). Kemudian, hasilnya di-implode menggunakan implode(', ', ...) 
            // sehingga membentuk string dengan tanda tanya yang dipisahkan oleh koma dan spasi.

            $sql = "INSERT INTO $this->table ($columns) VALUES ($placeholders)";

            $stmt = $this->db->prepare($sql);

            // Bind parameter
            $types = str_repeat('s', count($data));
            $stmt->bind_param($types, ...array_values($data));

            // Eksekusi statement
            $stmt->execute();

            // Tutup statement
            $stmt->close();
        } catch (\Throwable $th) {
            throw $th;
            header('Location: /error?message=' . urlencode($th->getMessage()));
            exit();
        }
    }

    // public function update($data)
    // {
    //     $sql = "UPDATE " . $this->table . " SET name = ?, email = ?, password = ? WHERE id = ?";
    //     $stmt = $this->db->prepare($sql);
    //     $stmt->bind_param("sssi", $data['name'], $data['email'], $data['password'], $data['id']);
    //     $stmt->execute();
    //     $stmt->close();
    // }

    public function update($id, $data)
    {
        try {
            // Membuat string setClause untuk prepared statement
            $setClause = implode(', ', array_map(function ($key) {
                return "$key = ?";
            }, array_keys($data)));

            // Membuat tipe data untuk bind_param
            $types = str_repeat('s', count($data)); // Tipe data 's' untuk string

            // Menambahkan tipe data 'i' untuk id
            $types .= 'i';

            // Menyusun query SQL
            $sql = "UPDATE $this->table SET $setClause WHERE id = ?";

            // Menyiapkan statement
            $stmt = $this->db->prepare($sql);

            // Bind parameter
            $params = array_merge(array($types), array_values($data), array($id));
            call_user_func_array(array($stmt, 'bind_param'), $params);

            // Eksekusi statement
            $stmt->execute();

            // Tutup statement
            $stmt->close();
        } catch (\Throwable $th) {
            throw $th;
            header('Location: /error?message=' . urlencode($th->getMessage()));
            exit();
        }
    }



    public function delete($id)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE id = $id";
        $this->db->query($sql);
    }

    public function where($column, $value)
    {
        $sql = "SELECT * FROM $this->table WHERE $column = ? LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $value);
        $stmt->execute();

        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        return $data;
    }
}
