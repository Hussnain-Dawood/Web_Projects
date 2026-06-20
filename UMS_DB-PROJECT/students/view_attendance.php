<?php
include '../connection.php';
include '../header.php';

session_start();
$student_id = $_SESSION['student_id'];

$sql = "SELECT * FROM attendance WHERE student_id='$student_id'";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Attendance - Student Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        #header {
            background-color: #0077b5;
            color: white;
            padding: 10px 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }
        #header h1 {
            margin: 0;
            font-size: 24px;
            display: inline-block;
        }
        #main {
            margin-top: 60px; /* Adjust for the fixed header */
            padding: 20px;
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #0077b5;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #0077b5;
            color: white;
        }
        #footer {
            text-align: center;
            margin-top: 20px;
        }
        #footer a {
            text-decoration: none;
            color: #0077b5;
            font-size: 16px;
        }
        #footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div id="header">
    </div>
    <div id="main">
        <h2>Attendance Records</h2>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Attendance</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row["date"]; ?></td>
                            <td><?php echo $row["attendance"]; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No attendance records found</p>
        <?php endif; ?>
        
        <div id="back-button">
            <a href="javascript:history.back()">Back</a>
        </div>
    </div>
    <div id="footer">
        <a href="javascript:history.back()">Back</a>
    </div>
</body>
</html>
<?php
include '../footer.php';
?>
