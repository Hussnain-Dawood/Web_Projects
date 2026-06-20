<?php
session_start();
include 'header.php';

if (!isset($_SESSION['user_type'])) {
    header("Location: index.php");
    exit();
}

$user_type = $_SESSION['user_type'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Information Management System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="main">
        <div id="header">
            <h1>Welcome to Student Information Management System</h1>
        </div>
        <div id="menu">
            <ul>
                <?php if ($user_type == 'admin'): ?>
                    <li><a href="admin/add_faculty.php">Add Faculty</a></li>
                    <li><a href="admin/delete_faculty.php">Delete Faculty</a></li>
                    <li><a href="admin/add_student.php">Add Student</a></li>
                    <li><a href="admin/delete_student.php">Delete Student</a></li>
                    <li><a href="admin/update_notification.php">Update Notification</a></li>
                    <li><a href="admin/view_students.php">View Students</a></li>
                    <li><a href="admin/allot_subjects.php">Allot Subjects</a></li>
                    <li><a href="admin/view_results.php">View Results</a></li>
                <?php elseif ($user_type == 'faculty'): ?>
                    <li><a href="faculty/add_notification.php">Add Notification</a></li>
                    <li><a href="faculty/add_students.php">Add Students</a></li>
                    <li><a href="faculty/submit_attendance.php">Submit Attendance</a></li>
                    <li><a href="faculty/submit_results.php">Submit Results</a></li>
                    <li><a href="faculty/allot_assignments.php">Allot Assignments</a></li>
                <?php elseif ($user_type == 'student'): ?>
                    <li><a href="students/view_attendance.php">View Attendance</a></li>
                    <li><a href="students/update_contact.php">Update Contact</a></li>
                    <li><a href="students/view_marksheet.php">View Marksheet</a></li>
                    <li><a href="students/message_classmates.php">Message Classmates</a></li>
                    <li><a href="students/view_assignments.php">View Assignments</a></li>
                    <li><a href="students/submit_assignments.php">Submit Assignments</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <div id="content">
            <!-- Add content here based on user type -->
        </div>
        <div id="footer">
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
