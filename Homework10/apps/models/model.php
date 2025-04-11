<?php

namespace App\Models;

use PDO;
use PDOException;

class DatabaseConnection
{
    private $host = 'localhost';
    private $db = 'frog_products_db'; // Updated database name
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8mb4';
    private $pdo;

    public function __construct()
    {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    // Get the PDO connection instance
    public function getConnection()
    {
        return $this->pdo;
    }
}

