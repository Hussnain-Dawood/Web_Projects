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

// Fetch row to edit
$query = "SELECT * FROM `$table` WHERE id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    die("Record not found.");
}

// Update logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $columns = array_keys($row);
    $updates = [];
    $types = '';
    $values = [];

    foreach ($columns as $col) {
        if ($col === 'id') continue; // don't update ID
        $updates[] = "$col = ?";
        $types .= "s";
        $values[] = $_POST[$col];
    }

    $types .= "i"; // for ID
    $values[] = $id;

    $sql = "UPDATE `$table` SET " . implode(", ", $updates) . " WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param($types, ...$values);
    if ($stmt->execute()) {
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "Error updating: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit - <?php echo htmlspecialchars($table); ?></title>
</head>
<body>
    <h2>Edit Record in "<?php echo htmlspecialchars($table); ?>"</h2>
    <form method="POST">
        <?php foreach ($row as $column => $value): ?>
            <?php if ($column === 'id') continue; ?>
            <label><?php echo htmlspecialchars($column); ?>:</label><br>
            <input type="text" name="<?php echo $column; ?>" value="<?php echo htmlspecialchars($value); ?>"><br><br>
        <?php endforeach; ?>
        <button type="submit">Update</button>
        <a href="admin_dashboard.php">Cancel</a>
    </form>
</body>
</html>
