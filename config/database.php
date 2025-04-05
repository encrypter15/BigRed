<?php
define("DB_HOST", "localhost");
define("DB_USER", "your_username");
define("DB_PASS", "your_password");
define("DB_NAME", "bigred_db");

class Database {
    private $conn;
    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }
        return $this->conn;
    }
}

