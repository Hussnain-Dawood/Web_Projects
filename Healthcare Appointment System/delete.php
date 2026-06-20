<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "healthcare";

$con = new mysqli($server, $username, $password, $database);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$table = $_GET['table'] ?? '';
$id = $_GET['id'] ?? '';

if (!$table || !$id) {
    die("Invalid request.");
}

// Validate and delete
$stmt = $con->prepare("DELETE FROM `$table` WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: admin-dashboard.php");
    exit();
} else {
    echo "Error deleting: " . $stmt->error;
}
