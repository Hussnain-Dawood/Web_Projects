<?php
include 'php/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $password = $_POST['password'];
    $dob      = $_POST['dob'];
    $role     = $_POST['role'];

    $sql = "INSERT INTO users (name, email, phone, password, dob, role)
            VALUES ('$name', '$email', '$phone', '$password', '$dob', '$role')";

    if ($conn->query($sql) === TRUE) {
        $success = "Signup successful. <a href='login.php'>Login here</a>";
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup - MedCare</title>
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
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="doctors.html">Doctors</a></li>
                <li><a href="booking.html">Book Appointment</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php" class="active">Signup</a></li>
            </ul>
        </nav>
    </div>
</header>

<main class="form-wrapper">
    <form method="POST" action="">
        <h2>Signup</h2>
        <?php
        if (isset($success)) echo "<p style='color:green; text-align:center;'>$success</p>";
        if (isset($error)) echo "<p class='error'>$error</p>";
        ?>
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="phone" placeholder="Phone">
        <input type="password" name="password" placeholder="Password" required>
        <input type="date" name="dob">
        <select name="role" required>
            <option value="" disabled selected>Select Role</option>
            <option value="patient">Patient</option>
            <option value="doctor">Doctor</option>
            <option value="admin">Admin</option>
        </select>
        <button type="submit">Sign Up</button>
        <a href="login.php">Already have an account? Login</a>
    </form>
</main>

<footer>
    <div class="footer-bottom">
        <p>&copy; 2025 MedCare. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
