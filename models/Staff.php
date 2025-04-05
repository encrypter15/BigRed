<?php
class Staff {
    private $db;
    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }
    public function getAllShifts() {
        $query = "SELECT * FROM shifts";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function scheduleShift($user_id, $start_time, $end_time) {
        $query = "INSERT INTO shifts (user_id, start_time, end_time) VALUES (:user_id, :start_time, :end_time)";
        $stmt = $this->db->prepare($query);
        $stmt->execute(["user_id" => $user_id, "start_time" => $start_time, "end_time" => $end_time]);
    }
}

