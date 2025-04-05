<!DOCTYPE html>
<html><head><title>BigRed - Membership</title><link rel="stylesheet" href="css/style.css"></head>
<body><h1>Membership</h1>
<form method="POST" action="index.php?action=membership">
    <input type="number" name="user_id" placeholder="User ID" required>
    <select name="tier"><option value="basic">Basic</option><option value="premium">Premium</option></select>
    <button type="submit">Add</button>
</form>
<table><tr><th>User ID</th><th>Tier</th></tr>
<?php foreach ($memberships as $membership): ?>
    <tr><td><?php echo $membership["user_id"]; ?></td><td><?php echo $membership["tier"]; ?></td></tr>
<?php endforeach; ?></table></body></html>

