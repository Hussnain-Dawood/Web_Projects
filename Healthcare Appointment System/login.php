<?php
session_start();
include 'php/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role']    = $user['role'];
        $_SESSION['name']    = $user['name'];
        $_SESSION['email']   = $user['email'];

        if ($user['role'] == 'admin') {
            header("Location: admin-dashboard.php");
        } elseif ($user['role'] == 'doctor') {
            header("Location: doctor-dashboard.php");
        } else {
            header("Location: patient-dashboard.php");
        }
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MedCare Login</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body>

<header>
    <div class="container">
        <div class="logo">
            <img src="images/logo.jfif" alt="Logo">
            <h2>MedCare</h2>
        </div>
        <nav>
            <ul>
                <li><a href="index.html" class="active">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="doctors.html">Doctors</a></li>
                <li><a href="booking.html">Book Appointment</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Signup</a></li>
            </ul>
        </nav>
    </div>
</header>

<main class="form-wrapper">
    <form method="POST" action="">
        <h2>Login</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
        <a href="signup.php">Don't have an account? Sign up</a>
    </form>
</main>

<footer>
    <div class="footer-bottom">
        <p>&copy; 2025 MedCare. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
