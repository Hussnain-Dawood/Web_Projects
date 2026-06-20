<?php
include '../connection.php';
include '../header.php';

session_start();
$student_id = $_SESSION['student_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    $sql = "UPDATE students SET email='$email', phone='$phone' WHERE student_id='$student_id'";
    
    if ($conn->query($sql) === TRUE) {
        $message = "Contact details updated successfully";
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
    <title>Update Contact - Student Dashboard</title>
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
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        form input[type="email"],
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
        .message {
            text-align: center;
            margin: 20px 0;
            color: green;
            font-size: 16px;
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
        <h1>Update Contact - Student Dashboard</h1>
    </div>
    <div id="main">
        <h2>Update Contact Details</h2>
        
        <?php if (isset($message)): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>
        
        <form method="post" action="update_contact.php">
            <input type="email" name="email" placeholder="Enter new email" required>
            <input type="text" name="phone" placeholder="Enter new phone number" required>
            <input type="submit" value="Update Contact">
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
