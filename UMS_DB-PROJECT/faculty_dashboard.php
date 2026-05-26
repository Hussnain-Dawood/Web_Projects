<?php
session_start();
include 'header.php';

// Redirect to login page if user is not authenticated or not a faculty
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'faculty') {
    header("Location: login_handler.php");
    exit();
}

include 'connection.php';

// Fetch faculty profile from the database
$faculty_id = $_SESSION['user_id']; // Assuming faculty_id is used for session identification
$sql = "SELECT * FROM faculty WHERE faculty_id='$faculty_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $faculty_name = $row['name'];
    $faculty_department = $row['department'];
    // Add more fields as needed (e.g., email, phone)
} else {
    // Handle error if no profile found (though it shouldn't happen if user type and session are managed correctly)
    $faculty_name = "Unknown";
    $faculty_department = "Unknown";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Faculty Dashboard - Student Information Management System</title>
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
        <h1>Faculty Dashboard</h1>
    </div>
    <div id="main">
        <div id="profile-info">
            <h2>Welcome, <?php echo $faculty_name; ?></h2>
            <p><strong>Department:</strong> <?php echo $faculty_department; ?></p>
            <!-- Add more profile fields as needed -->
        </div>
        <div id="menu">
            <ul>
                <li><a href="faculty/submit_attendance.php">Submit Attendance</a></li>
                <li><a href="faculty/submit_results.php">Submit Results</a></li>
                <li><a href="faculty/allot_assignments.php">Allot Assignments</a></li>
            </ul>
        </div>
        <div id="content">
            <!-- Add content specific to faculty here -->
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
