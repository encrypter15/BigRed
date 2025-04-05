<?php
class Rental {
    private $db;
    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }
    public function getAllRentals() {
        $query = "SELECT * FROM rentals";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function rentItem($item_name, $user_id) {
        $query = "INSERT INTO rentals (item_name, user_id, status) VALUES (:item_name, :user_id, \"rented\")";
        $stmt = $this->db->prepare($query);
        $stmt->execute(["item_name" => $item_name, "user_id" => $user_id]);
    }
}

