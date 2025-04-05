<?php
class Feedback {
    private $db;
    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }
    public function getAllFeedback() {
        $query = "SELECT * FROM feedback";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function submitFeedback($rating, $comment) {
        $query = "INSERT INTO feedback (rating, comment) VALUES (:rating, :comment)";
        $stmt = $this->db->prepare($query);
        $stmt->execute(["rating" => $rating, "comment" => $comment]);
    }
}

