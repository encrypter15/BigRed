<!DOCTYPE html>
<html><head><title>BigRed - Food</title><link rel="stylesheet" href="css/style.css"></head>
<body><h1>Food & Beverage</h1>
<form method="POST" action="index.php?action=food">
    <input type="text" name="item_name" placeholder="Item Name" required>
    <input type="number" name="quantity" placeholder="Quantity" required>
    <button type="submit">Order</button>
</form>
<table><tr><th>Item</th><th>Quantity</th></tr>
<?php foreach ($orders as $order): ?>
    <tr><td><?php echo $order["item_name"]; ?></td><td><?php echo $order["quantity"]; ?></td></tr>
<?php endforeach; ?></table></body></html>

