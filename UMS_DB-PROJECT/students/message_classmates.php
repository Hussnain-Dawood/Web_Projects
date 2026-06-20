<?php
include '../connection.php';

session_start();
$student_id = $_SESSION['student_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = $_POST['message'];
    
    $sql = "INSERT INTO messages (student_id, message) VALUES ('$student_id', '$message')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>

<form method="post" action="message_classmates.php">
    Message: <textarea name="message"></textarea><br>
    <input type="submit" value="Send Message">
</form>
