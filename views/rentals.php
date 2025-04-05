<!DOCTYPE html>
<html><head><title>BigRed - Rentals</title><link rel="stylesheet" href="css/style.css"></head>
<body><h1>Equipment Rentals</h1>
<form method="POST" action="index.php?action=rentals">
    <input type="text" name="item_name" placeholder="Item Name" required>
    <input type="number" name="user_id" placeholder="User ID" required>
    <button type="submit">Rent</button>
</form>
<table><tr><th>Item</th><th>User ID</th><th>Status</th></tr>
<?php foreach ($rentals as $rental): ?>
    <tr><td><?php echo $rental["item_name"]; ?></td><td><?php echo $rental["user_id"]; ?></td><td><?php echo $rental["status"]; ?></td></tr>
<?php endforeach; ?></table></body></html>

