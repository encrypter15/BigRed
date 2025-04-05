<!DOCTYPE html>
<html><head><title>BigRed - Feedback</title><link rel="stylesheet" href="css/style.css"></head>
<body><h1>Feedback</h1>
<form method="POST" action="index.php?action=feedback">
    <input type="number" name="rating" min="1" max="5" placeholder="Rating (1-5)" required>
    <textarea name="comment" placeholder="Comment" required></textarea>
    <button type="submit">Submit</button>
</form>
<table><tr><th>Rating</th><th>Comment</th></tr>
<?php foreach ($feedbacks as $feedback): ?>
    <tr><td><?php echo $feedback["rating"]; ?></td><td><?php echo $feedback["comment"]; ?></td></tr>
<?php endforeach; ?></table></body></html>

