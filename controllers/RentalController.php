<?php
require_once "models/Rental.php";
class RentalController {
    private $rentalModel;
    public function __construct() {
        $this->rentalModel = new Rental();
    }
    public function index() {
        $rentals = $this->rentalModel->getAllRentals();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->rentalModel->rentItem($_POST["item_name"], $_POST["user_id"]);
            header("Location: index.php?action=rentals");
        }
        require_once "views/rentals.php";
    }
}

