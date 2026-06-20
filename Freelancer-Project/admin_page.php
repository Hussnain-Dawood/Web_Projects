<?php
session_start();

$server = "127.0.0.1:3308";
$username = "root";
$password = "";
$database = "freelancer_hub";

$con = new mysqli($server, $username, $password, $database);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Role detection
$role = "Unknown";
if (isset($_SESSION['email'])) {
    $email = $con->real_escape_string($_SESSION['email']);
    $query = "SELECT role FROM users WHERE email = '$email'";
    $result = $con->query($query);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $role = htmlspecialchars($row['role']);
    } else {
        $role = "Role not found";
    }
} else {
    $role = "Not logged in";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Freelancer Hub Database Viewer</title>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
            margin: 0;
        }
        h1 {
            color: #2c3e50;
            margin-top: 90px;
            text-align: center;
        }
        h2 {
            color: #27ae60;
            margin-top: 30px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
            margin-bottom: 30px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        p {
            color: #999;
            font-style: italic;
        }
        header {
            background-color: #333;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 30px;
            color: white;
        }
        .navbar a {
            color: white;
            margin: 0 10px;
            text-decoration: none;
            font-weight: bold;
        }
        .navbar a:hover {
            text-decoration: underline;
        }
        .navbar img {
            height: 50px;
        }
        .role {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .role p {
            color: white;
            margin: 0;
        }
    </style>
</head>
<body>
<header>
    <div class='navbar'>
        <a href='user_page.php'><img src='image/logo-removebg-preview.png' alt='Logo'></a>
        <div>
            <a href='user_page.php'>Home</a>
            <a href='browsejob.php'>Browse Jobs</a>
            <a href='profile.html'>Profiles</a>
            <a href='aboutus.php'>About</a>
            <a href='contact.php'>Contact</a>
            <a href='admin_page.php'>Admin Panel</a>
            <a href="logout.php">Logout</a>
        </div>
        <div class='role'>
            <img src='image/user.webp' alt='User' width='40' style='border-radius: 50%;'>
            <p style="margin: 0px;"><?php echo $role; ?></p>
        </div>
    </div>
</header>

<h1>Database: Freelancer Hub</h1>

<?php
$tables = $con->query("SHOW TABLES");
while ($tableRow = $tables->fetch_array()) {
    $tableName = $tableRow[0];
    echo "<h2>Table: $tableName</h2>";

    $result = $con->query("SELECT * FROM `$tableName`");
    if ($result && $result->num_rows > 0) {
        echo "<table>";
        $fields = $result->fetch_fields();

        echo "<tr>";
        foreach ($fields as $field) {
            echo "<th>{$field->name}</th>";
        }
        echo "<th>Actions</th>";
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $data) {
                echo "<td>" . htmlspecialchars($data) . "</td>";
            }

            $id = reset($row); 
            echo "<td>
                <a href='edit.php?table=$tableName&id=$id'>Edit</a> |
                <a href='delete.php?table=$tableName&id=$id' onclick='return confirm(\"Are you sure?\")'>Delete</a>
            </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No data in this table.</p>";
    }
}
$con->close();
?>
</body>
</html>
