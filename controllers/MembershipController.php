<?php
require_once "models/Membership.php";
class MembershipController {
    private $membershipModel;
    public function __construct() {
        $this->membershipModel = new Membership();
    }
    public function index() {
        $memberships = $this->membershipModel->getAllMemberships();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->membershipModel->createMembership($_POST["user_id"], $_POST["tier"]);
            header("Location: index.php?action=membership");
        }
        require_once "views/membership.php";
    }
}

