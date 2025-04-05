<?php
require_once "models/Loyalty.php";
class LoyaltyController {
    private $loyaltyModel;
    public function __construct() {
        $this->loyaltyModel = new Loyalty();
    }
    public function index() {
        $points = $this->loyaltyModel->getAllPoints();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->loyaltyModel->addPoints($_POST["user_id"], $_POST["points"]);
            header("Location: index.php?action=loyalty");
        }
        require_once "views/loyalty.php";
    }
}

