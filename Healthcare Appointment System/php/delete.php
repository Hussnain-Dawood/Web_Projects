<?php
require_once 'db.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $sql = "DELETE FROM appointments WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error deleting appointment: " . mysqli_error($conn);
    }
} else {
    echo "No appointment ID provided.";
}

mysqli_close($conn);
?>
