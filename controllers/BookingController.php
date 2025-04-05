<?php
require_once "models/Booking.php";
require_once "models/TeeTime.php";
class BookingController {
    private $bookingModel, $teeTimeModel;
    public function __construct() {
        $this->bookingModel = new Booking();
        $this->teeTimeModel = new TeeTime();
    }
    public function index() {
        $bookings = $this->bookingModel->getAllBookings();
        $date = isset($_GET["date"]) ? $_GET["date"] : date("Y-m-d");
        $tee_times = $this->teeTimeModel->getAvailableTeeTimes($date);
        require_once "views/booking.php";
    }
    public function apiGetBookings() {
        $bookings = $this->bookingModel->getAllBookings();
        header("Content-Type: application/json");
        echo json_encode($bookings);
    }
}

