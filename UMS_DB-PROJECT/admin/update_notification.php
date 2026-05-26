<?php
include '../connection.php';
include 'header.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $notification_id = $_POST['notification_id'];
    $content = $_POST['content'];
    
    // Validate input (optional, depending on your requirements)
    
    // Update notification
    $sql = "UPDATE notifications SET content='$content' WHERE notification_id='$notification_id'";
    
    if ($conn->query($sql) === TRUE) {
        $message = "Notification updated successfully";
    } else {
        $message = "Error updating notification: " . $conn->error;
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Notification - Admin Dashboard</title>
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
        form input[type="text"],
        form textarea {
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
        <h2>Update Notification</h2>
        <?php if (!empty($message)): ?>
            <p class="message <?php echo (strpos($message, 'successfully') !== false) ? 'success' : 'error'; ?>"><?php echo $message; ?></p>
        <?php endif; ?>
        <form method="post" action="update_notification.php">
            <input type="text" name="notification_id" placeholder="Notification ID" required>
            <textarea name="content" placeholder="Notification Content" rows="4" required></textarea>
            <input type="submit" value="Update Notification">
        </form>
        <div class="back-button">
            <a href="javascript:history.back()">Back</a>
        </div>
    </div>
</body>
</html>
<?php
include 'footer.php';
?>
