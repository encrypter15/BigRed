<?php
require_once "models/Feedback.php";
class FeedbackController {
    private $feedbackModel;
    public function __construct() {
        $this->feedbackModel = new Feedback();
    }
    public function index() {
        $feedbacks = $this->feedbackModel->getAllFeedback();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->feedbackModel->submitFeedback($_POST["rating"], $_POST["comment"]);
            header("Location: index.php?action=feedback");
        }
        require_once "views/feedback.php";
    }
}

