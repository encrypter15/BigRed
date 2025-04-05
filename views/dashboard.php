<!DOCTYPE html>
<html><head><title>BigRed - Dashboard</title><link rel="stylesheet" href="css/style.css"></head>
<body><h1>Dashboard</h1>
<div class="weather-widget">
    <h2>Weather</h2>
    <?php if (isset($weather["error"])): ?>
        <p><?php echo $weather["error"]; ?></p>
    <?php else: ?>
        <p><img src="http://openweathermap.org/img/wn/<?php echo $weather["icon"]; ?>@2x.png"> <?php echo $weather["temp"]; ?>°F - <?php echo $weather["description"]; ?></p>
    <?php endif; ?>
</div>
<nav>
    <a href="index.php?action=booking">Bookings</a>
    <a href="index.php?action=proshop">Pro Shop</a>
    <a href="index.php?action=loyalty">Loyalty</a>
    <a href="index.php?action=rentals">Rentals</a>
    <a href="index.php?action=tournaments">Tournaments</a>
    <a href="index.php?action=staff">Staff</a>
    <a href="index.php?action=membership">Membership</a>
    <a href="index.php?action=food">Food</a>
    <a href="index.php?action=feedback">Feedback</a>
    <a href="index.php?action=logout">Logout</a>
</nav>
<iframe src="views/course_map.php" style="width:100%;height:400px;border:none;"></iframe>
</body></html>

