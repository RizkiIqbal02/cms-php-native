<?php

namespace App\Config;

class Database
{

    private $host = "127.0.0.1";
    private $user = "root";
    private $pass = "root";
    private $dbname = "cms_native_php";

    protected $connection;

    public function __construct()
    {
        if (!$this->connection) {
            $this->connect();
            // var_dump($this->connection);
        }
    }

    public function connect()
    {
        $this->connection = new \mysqli($this->host, $this->user, $this->pass, $this->dbname);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        } else {
            // echo "Connected successfully";
        }

        return $this->connection;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function disconnect()
    {
        $this->connection->close();
    }
};
