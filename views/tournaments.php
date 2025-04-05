<!DOCTYPE html>
<html><head><title>BigRed - Tournaments</title><link rel="stylesheet" href="css/style.css"></head>
<body><h1>Tournaments</h1>
<form method="POST" action="index.php?action=tournaments">
    <input type="text" name="name" placeholder="Tournament Name" required>
    <input type="date" name="date" required>
    <button type="submit">Create</button>
</form>
<table><tr><th>Name</th><th>Date</th></tr>
<?php foreach ($tournaments as $tournament): ?>
    <tr><td><?php echo $tournament["name"]; ?></td><td><?php echo $tournament["date"]; ?></td></tr>
<?php endforeach; ?></table></body></html>

