<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $faculty_id = $_POST['faculty_id'];
    $name = $_POST['name'];
    $department = $_POST['department'];
    $email = $_POST['email'];
    
    $sql = "INSERT INTO faculty (faculty_id, name, department, email) VALUES ('$faculty_id', '$name', '$department', '$email')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New faculty added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>

<form method="post" action="add_faculty.php">
    Faculty ID: <input type="text" name="faculty_id"><br>
    Name: <input type="text" name="name"><br>
    Department: <input type="text" name="department"><br>
    Email: <input type="email" name="email"><br>
    <input type="submit" value="Add Faculty">
</form>
