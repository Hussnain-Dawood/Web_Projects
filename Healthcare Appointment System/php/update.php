<?php
require_once 'db.php';

$id = $_POST['id'];
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$doctor = $_POST['doctor'];
$appointment_date = $_POST['appointment_date'];
$appointment_time = $_POST['appointment_time'];
$reason = $_POST['reason'];

$sql = "UPDATE appointments SET 
            full_name = '$full_name',
            email = '$email',
            phone = '$phone',
            dob = '$dob',
            gender = '$gender',
            doctor = '$doctor',
            appointment_date = '$appointment_date',
            appointment_time = '$appointment_time',
            reason = '$reason'
        WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo "Appointment updated successfully!";
    echo "<br><a href='index.php'>Back to List</a>";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
