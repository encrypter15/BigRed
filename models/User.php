<?php
class User {
    private $db;
    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }
    public function authenticate($username, $password) {
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->execute(["username" => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return password_verify($password, $user["password"]) ? $user : false;
    }
}

