<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .logout-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .logout-container h2 {
            color: #27ae60;
            margin-bottom: 20px;
        }
        .logout-container a {
            text-decoration: none;
            background-color: #3498db;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .logout-container a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <h2>You have been logged out </h2>
        <p>Click the button below to return to the login page:</p>
        <a href="index.php"> Go to Login Page</a>
    </div>
</body>
</html>
