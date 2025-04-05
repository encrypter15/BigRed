<!DOCTYPE html>
<html><head><title>BigRed - Loyalty</title><link rel="stylesheet" href="css/style.css"></head>
<body><h1>Loyalty Program</h1>
<form method="POST" action="index.php?action=loyalty">
    <input type="number" name="user_id" placeholder="User ID" required>
    <input type="number" name="points" placeholder="Points" required>
    <button type="submit">Add Points</button>
</form>
<table><tr><th>User ID</th><th>Points</th></tr>
<?php foreach ($points as $point): ?>
    <tr><td><?php echo $point["user_id"]; ?></td><td><?php echo $point["points"]; ?></td></tr>
<?php endforeach; ?></table></body></html>

