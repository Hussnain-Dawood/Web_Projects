<?php

require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $doctor = $_POST['doctor'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $reason = $_POST['reason'];

    $sql = "INSERT INTO appointments (full_name, email, phone, dob, gender, doctor, appointment_date, appointment_time, reason)
            VALUES ('$full_name', '$email', '$phone', '$dob', '$gender', '$doctor', '$appointment_date', '$appointment_time', '$reason')";

    if (mysqli_query($conn, $sql)) {
        echo "<h2>Appointment booked successfully!</h2>";
        echo "<a href='index.php'>View All Appointments</a>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
