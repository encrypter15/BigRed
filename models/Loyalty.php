<?php
class Loyalty {
    private $db;
    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }
    public function getAllPoints() {
        $query = "SELECT * FROM loyalty_points";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addPoints($user_id, $points) {
        $query = "INSERT INTO loyalty_points (user_id, points) VALUES (:user_id, :points)";
        $stmt = $this->db->prepare($query);
        $stmt->execute(["user_id" => $user_id, "points" => $points]);
    }
}

