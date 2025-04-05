<?php
require_once "models/Communication.php";
class CommunicationController {
    private $commModel;
    public function __construct() {
        $this->commModel = new Communication();
    }
    public function notifyBooking($booking_id) {
        $this->commModel->sendBookingNotification($booking_id);
    }
}

