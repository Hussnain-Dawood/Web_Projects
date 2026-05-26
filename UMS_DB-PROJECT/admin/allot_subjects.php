<?php
include '../connection.php';
include '../header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $faculty_id = $_POST['faculty_id'];
    $course_code = $_POST['course_code'];
    $course_title = $_POST['course_title'];
    
    // Insert or update subjects allotted to a student
    $sql = "INSERT INTO subjects_allotment (student_id, faculty_id, course_code, course_title) 
            VALUES ('$student_id', '$faculty_id', '$course_code', '$course_title') 
            ON DUPLICATE KEY UPDATE faculty_id='$faculty_id', course_code='$course_code', course_title='$course_title'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Subjects allotted successfully";
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
    <title>Allot Subjects - Student Information Management System</title>
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
            padding: 180px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            max-width: 700px;
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
        <form method="post" action="allot_subjects.php">
            <label for="student_id">Student ID:</label><br>
            <input type="text" id="student_id" name="student_id" required><br>
            
            <label for="faculty_id">Faculty ID:</label><br>
            <input type="text" id="faculty_id" name="faculty_id" required><br>
            
            <label for="course_code">Course Code:</label><br>
            <input type="text" id="course_code" name="course_code" required><br>
            
            <label for="course_title">Course Title:</label><br>
            <input type="text" id="course_title" name="course_title" required><br>
            
            <input type="submit" value="Allot Subjects">
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
