<!DOCTYPE html>
<html><head><title>BigRed - Bookings</title><link rel="stylesheet" href="css/style.css"></head>
<body><h1>Bookings</h1>
<form method="POST" action="index.php?action=booking">
    <input type="text" name="client" placeholder="Client Name" required>
    <select name="tee_time_id" required>
        <?php foreach ($tee_times as $tee_time): ?>
            <option value="<?php echo $tee_time["id"]; ?>"><?php echo date("H:i", strtotime($tee_time["tee_time"])); ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Book</button>
</form></body></html>

