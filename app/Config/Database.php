<?php

namespace App\Config;

class Database
{
    // parsing file .env nya ceritanya
    private $config;

    private $host;
    private $user;
    private $pass;
    private $dbname;

    protected $connection;

    public function __construct()
    {
        $this->config = parse_ini_file(__DIR__ . '/../../.env');

        $this->host = $this->config['DB_HOST'];
        $this->user = $this->config['DB_USERNAME'];
        $this->pass = $this->config['DB_PASSWORD'];
        $this->dbname = $this->config['DB_DATABASE'];
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
