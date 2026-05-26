<?php
session_start();
include 'header.php';
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin') {
    header("Location: login_handler.php");
    exit();
}
include 'connection.php';

$searchResults = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
    $searchTerm = $_POST['search_term'];
    $sql = "SELECT * FROM students WHERE student_id LIKE '%$searchTerm%' OR name LIKE '%$searchTerm%'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $searchResults[] = $row;
        }
    } else {
        $searchResults = [];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Student Information Management System</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        #main {
            margin-top: 80px; /* Adjust for the fixed header */
            padding: 20px;
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
        #profile {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            width: 80%;
            border-radius: 8px;
        }
        #menu {
            background-color: #f1f1f1;
            overflow: hidden;
            padding: 10px 0;
            margin: 20px 0;
            border-top: 2px solid #0077b5;
            border-bottom: 2px solid #0077b5;
        }
        #menu ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        #menu ul li {
            display: inline;
            margin: 0 10px;
        }
        #menu ul li a {
            color: #0077b5;
            text-decoration: none;
            font-size: 16px;
            padding: 10px 20px;
            display: inline-block;
        }
        #menu ul li a:hover {
            background-color: #0077b5;
            color: white;
            border-radius: 4px;
        }
        #search-bar {
            text-align: center;
            margin-bottom: 20px;
        }
        #search-bar input[type="text"] {
            padding: 10px;
            font-size: 16px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        #search-bar input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #0077b5;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        #search-bar input[type="submit"]:hover {
            background-color: #005f8b;
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
            padding: 10px;
            background-color: #333;
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
        #footer a {
            color: white;
            text-decoration: none;
        }
        #footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div id="main">
        <div id="header">
        </div>
        <div id="profile">
            <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
            <p>Role: <?php echo $_SESSION['user_type']; ?></p>
        </div>
        <div id="menu">
            <ul>
                <li><a href="admin/add_faculty.php">Add Faculty</a></li>
                <li><a href="admin/delete_faculty.php">Delete Faculty</a></li>
                <li><a href="admin/add_student.php">Add Student</a></li>
                <li><a href="admin/delete_student.php">Delete Student</a></li>
                <li><a href="admin/update_notification.php">Update Notification</a></li>
                <li><a href="admin/view_students.php">View Students</a></li>
                <li><a href="admin/allot_subjects.php">Allot Subjects</a></li>
                <li><a href="admin/view_results.php">View Results</a></li>
            </ul>
        </div>
        <div id="search-bar">
            <form method="post" action="admin_dashboard.php">
                <input type="text" name="search_term" placeholder="Search by Name or Student ID" required>
                <input type="submit" name="search" value="Search">
            </form>
        </div>
        <div id="logout-bar">
            <a href="logout.php">Logout</a>
        </div>
        <div id="content">
            <?php if (!empty($searchResults)): ?>
                <h3>Search Results:</h3>
                <table border="1" cellspacing="0" cellpadding="10">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($searchResults as $student): ?>
                            <tr>
                                <td><?php echo $student['student_id']; ?></td>
                                <td><?php echo $student['name']; ?></td>
                                <td><?php echo $student['email']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
                <p>No results found.</p>
            <?php endif; ?>
        </div>
        <div id="footer">
            &copy; <?php echo date("Y"); ?> COMSATS University Islamabad. All rights reserved.
        </div>
    </div>
</body>
</html>
<?php
include 'footer.php';
?>
