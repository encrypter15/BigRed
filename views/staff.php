<!DOCTYPE html>
<html><head><title>BigRed - Staff</title><link rel="stylesheet" href="css/style.css"></head>
<body><h1>Staff Management</h1>
<form method="POST" action="index.php?action=staff">
    <input type="number" name="user_id" placeholder="User ID" required>
    <input type="datetime-local" name="start_time" required>
    <input type="datetime-local" name="end_time" required>
    <button type="submit">Schedule</button>
</form>
<table><tr><th>User ID</th><th>Start</th><th>End</th></tr>
<?php foreach ($shifts as $shift): ?>
    <tr><td><?php echo $shift["user_id"]; ?></td><td><?php echo $shift["start_time"]; ?></td><td><?php echo $shift["end_time"]; ?></td></tr>
<?php endforeach; ?></table></body></html>

