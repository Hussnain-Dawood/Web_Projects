<?php
session_start();
include 'header.php';

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'student') {
    header("Location: login_handler.php");
    exit();
}

include 'connection.php';

// Fetch student profile from the database
$student_id = $_SESSION['user_id'];
$sql = "SELECT * FROM students WHERE username= '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $student_name = $row['name'];
    $student_department = $row['department'];
    $student_email = $row['email'];
    $student_phone = $row['phone']; // Assuming 'phone' is a field in the database
} else {
    // Handle error if no profile found (though it shouldn't happen if user type and session are managed correctly)
    $student_name = "Unknown";
    $student_department = "Unknown";
    $student_email = "Unknown";
    $student_phone = "Unknown";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard - Student Information Management System</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        #header {
            background-color: #0077b5;
            color: white;
            padding: 10px 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }
        #header h1 {
            margin: 0;
            font-size: 24px;
            display: inline-block;
        }
        #main {
            margin-top: 60px; /* Adjust for the fixed header */
            padding: 20px;
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #0077b5;
        }
        #profile-info {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f0f0f0;
            border-radius: 8px;
        }
        #profile-info p {
            margin: 5px 0;
        }
        #menu {
            margin-bottom: 20px;
        }
        #menu ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }
        #menu ul li {
            display: inline-block;
            margin: 0 10px;
        }
        #menu ul li a {
            text-decoration: none;
            color: #0077b5;
            font-size: 16px;
            padding: 10px 20px;
            border: 1px solid #0077b5;
            border-radius: 4px;
        }
        #menu ul li a:hover {
            background-color: #0077b5;
            color: white;
        }
        #content {
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            width: 80%;
            border-radius: 8px;
        }
        #footer {
            text-align: center;
            margin-top: 20px;
        }
        #footer a {
            text-decoration: none;
            color: #0077b5;
            font-size: 16px;
        }
        #footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div id="header">
    </div>
    <div id="main">
        <div id="profile-info">
            <h2>Welcome, <?php echo $student_name; ?></h2>
            <p><strong>Department:</strong> <?php echo $student_department; ?></p>
            <p><strong>Email:</strong> <?php echo $student_email; ?></p>
            <p><strong>Phone:</strong> <?php echo $student_phone; ?></p>
        </div>
        <div id="menu">
            <ul>
                <li><a href="students/view_attendance.php">View Attendance</a></li>
                <li><a href="students/update_contact.php">Update Contact</a></li>
                <li><a href="students/view_marksheet.php">View Marksheet</a></li>
                <li><a href="students/view_assignments.php">View Assignments</a></li>
                <li><a href="students/submit_assignments.php">Submit Assignments</a></li>
            </ul>
        </div>
        <div id="content">
            <!-- Add content specific to students here -->
        </div>
        <div id="footer">
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
<?php
include 'footer.php';
?>
