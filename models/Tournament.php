<?php
class Tournament {
    private $db;
    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }
    public function getAllTournaments() {
        $query = "SELECT * FROM tournaments";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function createTournament($name, $date) {
        $query = "INSERT INTO tournaments (name, date) VALUES (:name, :date)";
        $stmt = $this->db->prepare($query);
        $stmt->execute(["name" => $name, "date" => $date]);
    }
}

