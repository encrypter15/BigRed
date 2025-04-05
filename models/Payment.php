<?php
class Payment {
    private $db;
    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }
    public function create($amount, $user_id) {
        $query = "INSERT INTO payments (amount, user_id) VALUES (:amount, :user_id)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(["amount" => $amount, "user_id" => $user_id]);
    }
    public function getAllPayments() {
        $query = "SELECT * FROM payments";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

