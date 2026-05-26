<?php
include '../connection.php';
include '../header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $attendance_date = $_POST['attendance_date'];
    $attendance_status = $_POST['attendance_status'];
    
    // Assuming you want to update attendance for a specific date or insert if not exists
    $sql = "INSERT INTO attendance (student_id, attendance_date, attendance_status) 
            VALUES ('$student_id', '$attendance_date', '$attendance_status') 
            ON DUPLICATE KEY UPDATE attendance_status='$attendance_status'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Attendance submitted successfully";
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
    <title>Submit Attendance - Student Information Management System</title>
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
            margin-top: 220px; /* Adjust for the fixed header */
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #0077b5;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form input[type="text"], form input[type="date"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        form select {
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
        <form method="post" action="submit_attendance.php">
            <label for="student_id">Student ID:</label><br>
            <input type="text" id="student_id" name="student_id" required><br>
            
            <label for="attendance_date">Attendance Date:</label><br>
            <input type="date" id="attendance_date" name="attendance_date" required><br>
            
            <label for="attendance_status">Attendance Status:</label><br>
            <select id="attendance_status" name="attendance_status" required>
                <option value="Present">Present</option>
                <option value="Absent">Absent</option>
            </select><br>
            
            <input type="submit" value="Submit Attendance">
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
