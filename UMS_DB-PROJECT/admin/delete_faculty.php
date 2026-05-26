<?php
include '../connection.php';
include '../header.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $faculty_id = $_POST['faculty_id'];
    
    // Check if the faculty ID exists in the database
    $check_sql = "SELECT * FROM faculty WHERE faculty_id='$faculty_id'";
    $check_result = $conn->query($check_sql);
    
    if ($check_result->num_rows > 0) {
        // Faculty exists, proceed with deletion
        $delete_sql = "DELETE FROM faculty WHERE faculty_id='$faculty_id'";
        
        if ($conn->query($delete_sql) === TRUE) {
            $message = "Faculty deleted successfully";
        } else {
            $message = "Error deleting record: " . $conn->error;
        }
    } else {
        // Faculty does not exist
        $message = "Faculty with ID '$faculty_id' not found";
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Faculty - Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }
        #header {
            background-color: #0077b5;
            color: white;
            padding: 10px 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        #main {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin: 20px;
        }
        h2 {
            text-align: center;
            color: #0077b5;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        form input[type="text"] {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        form input[type="submit"] {
            padding: 10px 20px;
            background-color: #0077b5;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        form input[type="submit"]:hover {
            background-color: #005f8b;
        }
        .back-button {
            display: block;
            width: 80%;
            text-align: center;
            margin: 20px 0;
        }
        .back-button a {
            color: #0077b5;
            text-decoration: none;
            font-size: 16px;
        }
        .back-button a:hover {
            text-decoration: underline;
        }
        .message {
            text-align: center;
            margin: 20px 0;
            font-size: 16px;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div id="header">
        <h1>Admin Dashboard</h1>
    </div>
    <div id="main">
        <h2>Delete Faculty</h2>
        <?php if (!empty($message)): ?>
            <p class="message <?php echo ($message == "Faculty deleted successfully") ? 'success' : 'error'; ?>"><?php echo $message; ?></p>
        <?php endif; ?>
        <form method="post" action="delete_faculty.php">
            <input type="text" name="faculty_id" placeholder="Faculty ID" required>
            <input type="submit" value="Delete Faculty">
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
