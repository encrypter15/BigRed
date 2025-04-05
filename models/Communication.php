<?php
require_once "vendor/autoload.php"; // Assumes PHPMailer installed via Composer
class Communication {
    private $db;
    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }
    public function sendBookingNotification($booking_id) {
        $query = "SELECT client_name, booking_date FROM bookings WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(["id" => $booking_id]);
        $booking = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->Host = "smtp.example.com";
        $mail->SMTPAuth = true;
        $mail->Username = "your_email@example.com";
        $mail->Password = "your_password";
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        $mail->setFrom("your_email@example.com", "BigRed");
        $mail->addAddress("client@example.com"); // Replace with actual client email
        $mail->Subject = "Booking Confirmation";
        $mail->Body = "Dear " . $booking["client_name"] . ", your booking is confirmed for " . $booking["booking_date"] . ".";
        $mail->send();
    }
}

