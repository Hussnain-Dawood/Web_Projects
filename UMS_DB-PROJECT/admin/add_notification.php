<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = $_POST['content'];
    
    $sql = "INSERT INTO notifications (content) VALUES ('$content')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Notification added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>

<form method="post" action="add_notification.php">
    Content: <textarea name="content"></textarea><br>
    <input type="submit" value="Add Notification">
</form>
