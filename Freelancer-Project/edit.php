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

$query = "SELECT * FROM `$table` WHERE id = '$id'";
$result = $con->query($query);
if (!$result || $result->num_rows === 0) {
    die("Record not found.");
}
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $updateQuery = "UPDATE `$table` SET ";
    $updates = [];

    foreach ($_POST as $column => $value) {
        $escapedVal = $con->real_escape_string($value);
        $updates[] = "`$column` = '$escapedVal'";
    }

    $updateQuery .= implode(", ", $updates);
    $updateQuery .= " WHERE id = '$id'";

    if ($con->query($updateQuery)) {
        echo "Record updated. <a href='admin_page.php'>Go back</a>";
    } else {
        echo "Error updating: " . $con->error;
    }
    exit;
}
?>

<h2>Edit Record in <?= htmlspecialchars($table) ?></h2>
<form method="POST">
    <?php foreach ($row as $column => $value): ?>
        <label><?= htmlspecialchars($column) ?>:</label><br>
        <input type="text" name="<?= htmlspecialchars($column) ?>" value="<?= htmlspecialchars($value) ?>"><br><br>
    <?php endforeach; ?>
    <input type="submit" value="Update">
</form>
