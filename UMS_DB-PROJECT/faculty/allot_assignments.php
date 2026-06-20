<?php
include '../connection.php';
include '../header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $assignment = $_POST['assignment'];
    $submission_date = $_POST['submission_date'];
    
    $sql = "INSERT INTO assignments (student_id, assignment, submission_date) 
            VALUES ('$student_id', '$assignment', '$submission_date') 
            ON DUPLICATE KEY UPDATE assignment='$assignment', submission_date='$submission_date'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Assignment allotted successfully";
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
    <title>Allot Assignments - Student Information Management System</title>
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
            margin-top: 200px; /* Adjust for the fixed header */
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            max-width: 600px;
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
        form input[type="text"], form input[type="date"] {
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
        <h1>Allot Assignments</h1>
    </div>
    
    <div class="content">
        <form method="post" action="allot_assignments.php">
            <label for="student_id">Student ID:</label><br>
            <input type="text" id="student_id" name="student_id" required><br>
            
            <label for="assignment">Assignment:</label><br>
            <textarea id="assignment" name="assignment" rows="4" required></textarea><br>
            
            <label for="submission_date">Submission Date:</label><br>
            <input type="date" id="submission_date" name="submission_date" required><br>
            
            <input type="submit" value="Allot Assignment">
        </form>
        
        <div class="back-button">
            <a href="javascript:history.back()">Back</a>
        </div>
    </div>
</body>
</html>
<?php
include '../footer.php';
?>
