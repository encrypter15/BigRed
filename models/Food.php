<?php
class Food {
    private $db;
    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }
    public function getAllOrders() {
        $query = "SELECT * FROM food_orders";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function createOrder($item_name, $quantity) {
        $query = "INSERT INTO food_orders (item_name, quantity) VALUES (:item_name, :quantity)";
        $stmt = $this->db->prepare($query);
        $stmt->execute(["item_name" => $item_name, "quantity" => $quantity]);
    }
}

