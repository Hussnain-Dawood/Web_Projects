<?php include('config.php');

// Handle form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user input (later we can secure this better with prepared statements)
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Insert query
    $sql = "INSERT INTO `freelancer_hub`.`contact_messages` (name, email, subject, message)
            VALUES ('$name', '$email', '$subject', '$message')";

    if ($con->query($sql) === TRUE) {
        // Redirect with success flag
        header("Location: contact.php?success=1");
        exit();
    } else {
        echo "Error: " . $con->error;
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <style>
        body {
            background-image: url("image/Contactform.avif");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            color: #333;
            margin: 10px 0;
        }

        :root {
            --primary: #0077b6;
            --secondary: #023e8a;
            --light: #f8f9fa;
            --dark: #1c1c1c;
            --accent: #00b4d8;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light);
            color: var(--dark);
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: var(--primary);
            padding: 1rem 2rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            font-weight: 600;
            transition: color 0.3s;
        }

        .navbar a:hover {
            color: var(--accent);
        }

        .navbar img {
            height: 50px;
            filter: brightness(0) invert(1);
        }

        .role {
            text-align: right;
            color: white;
        }

        .role img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-bottom: 5px;
        }

        #heading11 {
            text-align: center;
            font-size: 40px;
            font-weight: bold;
            margin-top: 40px;
        }

        #contact-form {
            width: 80%;
            margin: 20px auto;
            padding: 30px;
            border-radius: 10px;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
            border: none;
        }

        textarea {
            resize: vertical;
        }

        .button1 {
            padding: 10px 20px;
            background-color: #cc0066;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button1:hover {
            background-color: #99004d;
        }

        .footer {
            background-color: #00b4d8;
            color: white;
            padding: 30px;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .container1 {
            width: 45%;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>

<!-- Header -->
<header>
    <div class="navbar">
        <a href="user_page.php"><img src="image/logo-removebg-preview.png" alt="Logo"></a>
        <div>
            <a href="user_page.php">Home</a>
            <a href="browsejob.php">Browse Jobs</a>
            <a href="profile.html">Profiles</a>
            <a href="aboutus.php">About</a>
            <a href="contact.php">Contact</a>
            
           
        </div>
        <img src="image/user.webp" alt="User" width="50" style="border-radius: 50%;">
    </div>
</header>

<!-- Contact Form -->
<p id="heading11">Contact us</p>
<div id="contact-form">
    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
    <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
         Message sent successfully!
    </div>
<?php endif; ?>

    <form method="post" action="contact.php">
        <label for="name"><strong>Name</strong></label>
        <input type="text" id="name" name="name" placeholder="Your name..." required>

        <label for="email"><strong>Email</strong></label>
        <input type="email" id="email" name="email" placeholder="Your email..." required>

        <label for="subject"><strong>Subject</strong></label>
        <input type="text" id="subject" name="subject" placeholder="Subject..." required>

        <label for="message"><strong>Message</strong></label>
        <textarea id="message" name="message" rows="6" placeholder="Write your message here..." required></textarea>

        <button type="submit" class="button1">Send Message</button>
    </form>
</div>

<!-- Footer -->
<div class="footer">
    <div class="container1">
        <h1>Need work done?</h1>
        <h4>Post your project and find qualified freelancers for your job. It's simple, safe, and effective.</h4>
        <h4>Our platform supports all types of jobs, from tech and design to writing and marketing.</h4>
    </div>
    <div class="container1">
        <a href="aboutus.php"><button class="button1">About Us</button></a>
        <a href="contact.php"><button class="button1">Contact Us</button></a>
        <h3>Developed by: Team FreelanceConnect</h3>
        <p>@ 2025 FreelanceConnect. All rights reserved.</p>
    </div>
</div>

</body>
</html>
