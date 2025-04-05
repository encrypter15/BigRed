<?php
require_once "models/Payment.php";
require_once "vendor/autoload.php"; // Assumes Stripe SDK installed via Composer
class PaymentController {
    private $paymentModel;
    public function __construct() {
        $this->paymentModel = new Payment();
        \Stripe\Stripe::setApiKey("your_stripe_secret_key"); // Replace with your key
    }
    public function process() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $amount = $_POST["amount"] * 100; // Convert to cents
            $token = $_POST["stripeToken"];
            $charge = \Stripe\Charge::create(["amount" => $amount, "currency" => "usd", "source" => $token]);
            $this->paymentModel->create($amount / 100, $_SESSION["user_id"]);
            header("Location: index.php?action=proshop");
        }
    }
    public function apiGetPayments() {
        $payments = $this->paymentModel->getAllPayments();
        header("Content-Type: application/json");
        echo json_encode($payments);
    }
}

