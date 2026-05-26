<?php
include '../connection.php';
include '../header.php';

session_start();
$student_id = $_SESSION['student_id'];

$sql = "SELECT * FROM results WHERE student_id='$student_id'";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Results - Student Dashboard</title>
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
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #0077b5;
            color: white;
        }
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        table tr:hover {
            background-color: #ddd;
        }
        .no-results {
            text-align: center;
            margin-top: 20px;
            color: #666;
            font-size: 16px;
        }
        #back-button {
            text-align: center;
            margin-top: 20px;
        }
        #back-button a {
            text-decoration: none;
            color: #0077b5;
            font-size: 16px;
        }
        #back-button a:hover {
            text-decoration: underline;
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
        <h2>Results</h2>
        
        <?php if ($result->num_rows > 0): ?>
            <table>
                <tr>
                    <th>Subject</th>
                    <th>Marks</th>
                </tr>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row["subject"]; ?></td>
                        <td><?php echo $row["marks"]; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p class="no-results">No results found</p>
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
$conn->close();
?>
<?php
include '../footer.php';
?>
