<?php
session_start();
require_once "config/database.php";
require_once "controllers/AuthController.php";
require_once "controllers/BookingController.php";
require_once "controllers/InventoryController.php";
require_once "controllers/PaymentController.php";
require_once "controllers/MaintenanceController.php";
require_once "controllers/AnalyticsController.php";
require_once "controllers/LoyaltyController.php";
require_once "controllers/RentalController.php";
require_once "controllers/TournamentController.php";
require_once "controllers/StaffController.php";
require_once "controllers/MembershipController.php";
require_once "controllers/CommunicationController.php";
require_once "controllers/FoodController.php";
require_once "controllers/FeedbackController.php";

$action = isset($_GET["action"]) ? $_GET["action"] : "login";
switch($action) {
    case "login": $controller = new AuthController(); $controller->login(); break;
    case "dashboard": $controller = new AuthController(); $controller->dashboard(); break;
    case "booking": $controller = new BookingController(); $controller->index(); break;
    case "proshop": $controller = new InventoryController(); $controller->index(); break;
    case "maintenance": $controller = new MaintenanceController(); $controller->index(); break;
    case "analytics": $controller = new AnalyticsController(); $controller->index(); break;
    case "loyalty": $controller = new LoyaltyController(); $controller->index(); break;
    case "rentals": $controller = new RentalController(); $controller->index(); break;
    case "tournaments": $controller = new TournamentController(); $controller->index(); break;
    case "staff": $controller = new StaffController(); $controller->index(); break;
    case "membership": $controller = new MembershipController(); $controller->index(); break;
    case "payment": $controller = new PaymentController(); $controller->process(); break;
    case "food": $controller = new FoodController(); $controller->index(); break;
    case "feedback": $controller = new FeedbackController(); $controller->index(); break;
    case "api_bookings": $controller = new BookingController(); $controller->apiGetBookings(); break;
    case "api_payments": $controller = new PaymentController(); $controller->apiGetPayments(); break;
    default: header("Location: index.php?action=login");
}

