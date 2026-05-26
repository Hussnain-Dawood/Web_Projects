<?php
include '../connection.php';
include '../header.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $department = $_POST['department'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    
    $sql = "INSERT INTO students (student_id, name, department, email, username, password, phone) 
            VALUES ('$student_id', '$name', '$department', '$email', '$username', '$password', '$phone')";
    
    if ($conn->query($sql) === TRUE) {
        $message = "New student added successfully";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Student - Admin Dashboard</title>
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
            padding: 50px 50px;
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
        form input[type="text"],
        form input[type="email"],
        form input[type="password"] {
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
            color: green;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div id="header">
        <h1>Admin Dashboard</h1>
    </div>
    <div id="main">
        <h2>Add Student</h2>
        <?php if ($message): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>
        <form method="post" action="add_student.php">
            <input type="text" name="student_id" placeholder="Student ID" required>
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="department" placeholder="Department" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="phone" placeholder="Phone" required>
            <input type="submit" value="Add Student">
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
