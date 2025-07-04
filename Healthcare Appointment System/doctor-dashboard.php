<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$database = "healthcare";

$con = new mysqli($server, $username, $password, $database);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Role Check
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'doctor') {
    header("Location: login.php");
    exit();
}
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor Dashboard</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="loginstyle.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f8fb;
        }

        main {
            padding: 60px 20px;
            max-width: 900px;
            margin: auto;
        }

        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 10px;
        }

        h2 {
            color: #333;
            margin-top: 40px;
        }

        .logout {
            text-align: right;
            padding: 15px 30px;
            background: #fff;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }

        .logout a {
            background: #e74c3c;
            color: white;
            padding: 8px 14px;
            text-decoration: none;
            border-radius: 5px;
        }

        .logout a:hover {
            background: #c0392b;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background: #fff;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            border: 1px solid #e1e1e1;
            padding: 12px 14px;
            text-align: left;
        }

        th {
            background: #2979ff;
            color: white;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        p {
            font-size: 16px;
            color: #555;
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
                <li><a href="about.html">About</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="doctors.html">Doctors</a></li>
                <li><a href="booking.html">Book Appointment</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>
</header>
<main>
    <h1>Doctor Dashboard</h1>

    <h2>Your Appointments</h2>

    <?php
    $result = $con->query("SELECT * FROM appointments WHERE email = '$email'");

    if ($result && $result->num_rows > 0) {
        echo "<table><tr>";
        foreach ($result->fetch_fields() as $field) {
            echo "<th>{$field->name}</th>";
        }
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $data) {
                echo "<td>" . htmlspecialchars($data) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No appointments assigned to you yet.</p>";
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
