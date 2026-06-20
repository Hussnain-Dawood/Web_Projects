<?php
$server = "127.0.0.1:3308";
$username = "root";
$password = "";
$database = "freelancer_hub";

$con = new mysqli($server, $username, $password, $database);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$table = $_GET['table'];
$id = $_GET['id'];

$deleteQuery = "DELETE FROM `$table` WHERE id = '$id'";
if ($con->query($deleteQuery)) {
    header("Location: admin_page.php");
} else {
    echo "Error deleting: " . $con->error;
}
?>
