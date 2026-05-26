<?php
include '../connection.php';
include '../header.php';

// Check if sorting order is specified in URL parameter
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'ASC';
$sortIcon = ($sort == 'ASC') ? '▲' : '▼';

// Query to fetch students with sorting order
$sql = "SELECT * FROM students ORDER BY student_id $sort";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Students - Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        #header {
            background-color: #0077b5;
            color: white;
            padding: 10px 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;
            width: 100%;
            z-index: 1000;
        }
        #header h1 {
            margin: 0;
            font-size: 24px;
            display: inline-block;
        }
        #main {
            padding: 120px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 80%;
            margin-top: 20px;
        }
        h2 {
            text-align: center;
            color: #0077b5;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #0077b5;
            color: white;
            cursor: pointer; /* Add cursor pointer for sorting */
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .message {
            text-align: center;
            margin: 20px 0;
            font-size: 16px;
        }
        .back-button {
            margin-top: 20px;
        }
        .back-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #0077b5;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .back-button a:hover {
            background-color: #005f8b;
        }
        .sort-button {
            display: inline-block;
            margin-left: 10px;
            padding: 5px 10px;
            background-color: #0077b5;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .sort-button:hover {
            background-color: #005f8b;
        }
    </style>
</head>
<body>
    <div id="header">
    </div>
    <div id="main">
        <h2>Student Information</h2>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th><a href="?sort=<?php echo ($sort == 'ASC') ? 'DESC' : 'ASC'; ?>">ID <?php echo $sortIcon; ?></a></th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row["student_id"]; ?></td>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["department"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["phone"]; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="message">No students found.</p>
        <?php endif; ?>
        <div class="back-button">
            <a href="javascript:history.back()">Back</a>
        </div>
    </div>
</body>
</html>

<?php
include '../footer.php';
$conn->close();
?>
