<?php
include '../connection.php';
include '../header.php';

session_start();
$student_id = $_SESSION['student_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $assignment = $_POST['assignment'];
    $submission_date = $_POST['submission_date'];
    
    $sql = "INSERT INTO assignments (student_id, assignment, submission_date) VALUES ('$student_id', '$assignment', '$submission_date')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Assignment submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit Assignments - Student Dashboard</title>
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
        form {
            margin-top: 20px;
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 8px;
        }
        form input[type="submit"] {
            background-color: #0077b5;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        form input[type="submit"]:hover {
            background-color: #005580;
        }
        form textarea, form input[type="date"] {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            resize: vertical;
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
        <h2>Submit Assignment</h2>
        
        <form method="post" action="submit_assignments.php">
            <label for="assignment">Assignment:</label><br>
            <textarea id="assignment" name="assignment" rows="5" required></textarea><br>
            <label for="submission_date">Submission Date:</label><br>
            <input type="date" id="submission_date" name="submission_date" required><br>
            <input type="submit" value="Submit Assignment">
        </form>
        
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
