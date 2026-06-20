<?php
session_start();
include 'header.php';
if (!isset($_SESSION['user_type'])) {
    header("Location: index.php");
    exit();
}

$user_type = $_SESSION['user_type'];

if ($user_type == 'admin') {
    header("Location: admin_dashboard.php");
    exit();
} elseif ($user_type == 'faculty') {
    header("Location: faculty_dashboard.php");
    exit();
} elseif ($user_type == 'student') {
    header("Location: student_dashboard.php");
    exit();
} else {
    header("Location: login_handler.php");
    exit();
}
?>
