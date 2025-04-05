<?php
require_once "models/Food.php";
class FoodController {
    private $foodModel;
    public function __construct() {
        $this->foodModel = new Food();
    }
    public function index() {
        $orders = $this->foodModel->getAllOrders();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->foodModel->createOrder($_POST["item_name"], $_POST["quantity"]);
            header("Location: index.php?action=food");
        }
        require_once "views/food.php";
    }
}

