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
if (!$table) {
    die("No table specified.");
}

$columnsRes = $con->query("DESCRIBE `$table`");
$columns = [];
while ($col = $columnsRes->fetch_assoc()) {
    if ($col['Field'] !== 'id') {
        $columns[] = $col['Field'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $values = [];
    foreach ($columns as $col) {
        $values[] = "'" . $con->real_escape_string($_POST[$col]) . "'";
    }

    $sql = "INSERT INTO `$table` (" . implode(",", $columns) . ") VALUES (" . implode(",", $values) . ")";
    if ($con->query($sql)) {
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "Error: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New - <?php echo htmlspecialchars($table); ?></title>
</head>
<body>
    <h2>Add New Entry in "<?php echo htmlspecialchars($table); ?>"</h2>
    <form method="POST">
        <?php foreach ($columns as $col): ?>
            <label><?php echo htmlspecialchars($col); ?>:</label><br>
            <input type="text" name="<?php echo $col; ?>" required><br><br>
        <?php endforeach; ?>
        <button type="submit">Add Record</button>
        <a href="admin_dashboard.php">Cancel</a>
    </form>
</body>
</html>
