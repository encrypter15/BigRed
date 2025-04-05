<?php
require_once "models/Weather.php";
class AuthController {
    private $weatherModel;
    public function __construct() {
        $this->weatherModel = new Weather();
    }
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require_once "models/User.php";
            $userModel = new User();
            $user = $userModel->authenticate($_POST["username"], $_POST["password"]);
            if ($user) {
                $_SESSION["user_id"] = $user["id"];
                header("Location: index.php?action=dashboard");
            }
        }
        require_once "views/login.php";
    }
    public function dashboard() {
        if (!isset($_SESSION["user_id"])) header("Location: index.php?action=login");
        $weather = $this->weatherModel->getCurrentWeather();
        require_once "views/dashboard.php";
    }
    public function logout() {
        session_destroy();
        header("Location: index.php?action=login");
    }
}

