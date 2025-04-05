<?php
class Membership {
    private $db;
    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }
    public function getAllMemberships() {
        $query = "SELECT * FROM memberships";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function createMembership($user_id, $tier) {
        $query = "INSERT INTO memberships (user_id, tier) VALUES (:user_id, :tier)";
        $stmt = $this->db->prepare($query);
        $stmt->execute(["user_id" => $user_id, "tier" => $tier]);
    }
}

