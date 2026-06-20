<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $department = $_POST['department'];
    $email = $_POST['email'];
    
    $sql = "INSERT INTO students (student_id, name, department, email) VALUES ('$student_id', '$name', '$department', '$email')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New student added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>

<form method="post" action="add_student.php">
    Student ID: <input type="text" name="student_id"><br>
    Name: <input type="text" name="name"><br>
    Department: <input type="text" name="department"><br>
    Email: <input type="email" name="email"><br>
    <input type="submit" value="Add Student">
</form>
