<?php
require_once "models/Staff.php";
class StaffController {
    private $staffModel;
    public function __construct() {
        $this->staffModel = new Staff();
    }
    public function index() {
        $shifts = $this->staffModel->getAllShifts();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->staffModel->scheduleShift($_POST["user_id"], $_POST["start_time"], $_POST["end_time"]);
            header("Location: index.php?action=staff");
        }
        require_once "views/staff.php";
    }
}

