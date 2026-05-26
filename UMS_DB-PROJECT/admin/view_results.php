<?php
include '../connection.php';
include '../header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['student_id'])) {
    $student_id = $_POST['student_id'];
    
    $sql = "SELECT * FROM results WHERE student_id = '$student_id'";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Results - Student Information Management System</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .header {
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
        .header h1 {
            margin: 0;
            font-size: 24px;
            display: inline-block;
        }
        .content {
            margin-top: 80px; /* Adjust for the fixed header */
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            max-width: 800px;
            margin: 0 auto;
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
        .back-button {
            text-align: center;
            margin-top: 20px;
        }
        .back-button a {
            text-decoration: none;
            color: #0077b5;
            font-size: 16px;
        }
        .back-button a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>View Results</h1>
    </div>
    
    <div class="content">
        <form method="post" action="view_results.php">
            <label for="student_id">Enter Student ID:</label>
            <input type="text" id="student_id" name="student_id" required>
            <input type="submit" value="View Results">
        </form>
        
        <h2>Results for Student ID: <?php echo $student_id; ?></h2>
        
        <?php
        if ($result->num_rows > 0) {
            echo '<table>';
            echo '<tr><th>Course Code</th><th>Course Title</th><th>Marks</th></tr>';
            while($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>'.$row['course_code'].'</td>';
                echo '<td>'.$row['course_title'].'</td>';
                echo '<td>'.$row['marks'].'</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo 'No results found for the student ID: ' . $student_id;
        }
        ?>
        
        <div class="back-button">
            <a href="javascript:history.back()">Back</a>
        </div>
    </div>
</body>
</html>

<?php
    $conn->close();
    include '../footer.php';
    exit(); // Exit after displaying results
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Results - Student Information Management System</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .header {
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
        .header h1 {
            margin: 0;
            font-size: 24px;
            display: inline-block;
        }
        .content {
            margin-top: 80px; /* Adjust for the fixed header */
            padding: 200px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            max-width: 800px;
            margin: 0 auto;
        }
        h2 {
            text-align: center;
            color: #0077b5;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        form label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        form input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #0077b5;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        form input[type="submit"]:hover {
            background-color: #005580;
        }
        .back-button {
            text-align: center;
            margin-top: 20px;
        }
        .back-button a {
            text-decoration: none;
            color: #0077b5;
            font-size: 16px;
        }
        .back-button a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="header">
    </div>
    
    <div class="content">
        <form method="post" action="view_results.php">
            <label for="student_id">Enter Student ID:</label>
            <input type="text" id="student_id" name="student_id" required>
            <input type="submit" value="View Results">
        </form>
        
        <div class="back-button">
            <a href="../admin_dashboard.php">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>

<?php
include '../footer.php';
?>
