<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $faculty_id = $_POST['faculty_id'];
    
    $sql = "DELETE FROM faculty WHERE faculty_id='$faculty_id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Faculty deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>

<form method="post" action="delete_faculty.php">
    Faculty ID: <input type="text" name="faculty_id"><br>
    <input type="submit" value="Delete Faculty">
</form>
