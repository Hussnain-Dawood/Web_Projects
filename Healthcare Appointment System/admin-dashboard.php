<?php
session_start();

// DB Connection
$server = "localhost";
$username = "root";
$password = "";
$database = "healthcare";

$con = new mysqli($server, $username, $password, $database);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Access Control
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Healthcare</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="loginstyle.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            padding: 20px;
            margin: 0;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }
        h2 {
            color: #2980b9;
            margin-top: 40px;
        }
        .add-btn {
            background: #27ae60;
            color: white;
            padding: 8px 16px;
            border: none;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 10px;
            display: inline-block;
        }
        .add-btn:hover {
            background: #1e8449;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
            background: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background: #3498db;
            color: white;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        .actions a {
            color: #2980b9;
            text-decoration: none;
            font-weight: bold;
            margin-right: 10px;
        }
        .actions a:hover {
            text-decoration: underline;
        }
        .logout {
            text-align: right;
            margin-bottom: 20px;
        }
        .logout a {
            background: #c0392b;
            color: white;
            padding: 8px 14px;
            text-decoration: none;
            border-radius: 5px;
        }
        .logout a:hover {
            background: #922b21;
        }
    </style>
</head>
<body>

<header>
    <div class="container">
        <div class="logo">
            <img src="images/logo.jfif" alt="Logo">
            <h2>MedCare</h2>
        </div>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="add_service.php">Add Services</a></li>
                <li><a href="add_medicine.php">Add Medicine</a></li>
                <li><a href="add_ambulance.php">Add Ambulance</a></li>
                <li><a href="booking.html">Book Appointment</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>
</header>


<main>
    <h1>Admin Dashboard: Healthcare System</h1>

    <?php
    $tables = ['users', 'appointments', 'contacts', 'services', 'ambulance_vehicles', 'pharmacy'];

    foreach ($tables as $tableName) {
        echo "<h2>Table: $tableName</h2>";
        echo "<a class='add-btn' href='add.php?table=$tableName'>+ Add New</a>";

        $result = $con->query("SELECT * FROM `$tableName`");
        if ($result && $result->num_rows > 0) {
            echo "<table>";
            $fields = $result->fetch_fields();

            echo "<tr>";
            foreach ($fields as $field) {
                echo "<th>{$field->name}</th>";
            }
            echo "<th>Actions</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                foreach ($row as $data) {
                    echo "<td>" . htmlspecialchars($data) . "</td>";
                }
                $id = $row['id'];
                echo "<td class='actions'>
                <a href='edit.php?table=$tableName&id=$id' style='display: inline-block;
    background-color: blue;
    color: white;
    padding: 5px 15px;
    border: none;
    border-radius: 15px;
    text-decoration: none;
    font-size: 14px;
    cursor: pointer;
    width: 86%;
'>Edit</a>
     
<a href='delete.php?table=$tableName&id=$id' onclick='return confirm(\"Are you sure you want to delete?\")' style='display: inline-block;
    background-color: blue;
    color: white;
    padding: 5px 15px;
    border: none;
    border-radius: 15px;
    text-decoration: none;
    font-size: 14px;
    cursor: pointer;
    width: 86%;'>Delete</a>
                </td></tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No records found in <strong>$tableName</strong>.</p>";
        }
    }
    $con->close();
    ?>
</main>
<footer>
    <div class="footer-bottom">
        <p>&copy; 2025 MedCare. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
