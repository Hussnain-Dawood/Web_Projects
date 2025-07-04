<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>About Us</title>
    <style>
       
        body {
            background-image: url("image/computer.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            margin: 0;
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
            color: black;
        }

        #heading1 {
            text-align: center;
            color: #333;
        }

        #content {
            width: 80%;
            margin: 20px auto;
            font-size: 18px;
            line-height: 1.6;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
        }

        .footer1 {
            display: flex;
            justify-content: center;
            gap: 50px;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .cont11 {
            text-align: center;
            background-color: rgba(255,255,255,0.9);
            padding: 20px;
            border-radius: 10px;
            width: 250px;
        }

        #imga {
            height: 150px;
            width: 150px;
            border-radius: 50%;
            object-fit: cover;
        }

        .footer {
            background-color:#00b4d8;
            color: white;
            padding: 30px;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 10%
        }

        .container1 {
            width: 45%;
        }

        .button1 {
            padding: 10px 20px;
            background-color: #cc0066;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px 0;
        }

        .button1:hover {
            background-color: #99004d;
        }

        a {
            text-decoration: none;
        }
        p {
        font-size: 18px;
        line-height: 1.6;
        color: white;
        margin: 10px 0;
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

<!-- Main Content -->
<p id="heading11">About us</p>
<h2 id="heading1"><b>Freelance Marketplace @ Connecting Talent with Opportunity</b></h2>
<div id="content">
    Our platform is designed to connect clients and freelancers in a seamless environment that promotes collaboration and results. With categories ranging from IT & Programming to Content Writing, Design, and Marketing, we offer a wide range of opportunities and talent.
    <br><br>
    Our mission is to simplify the freelancing process—whether you're looking to hire professionals or seeking freelance work, everything you need is right here.
</div>

<!-- Team Members -->
<div class="footer1">
    <div class="cont11">
        <img id="imga" src="image/img01.jpg" alt="Team Member 1">
        <br><b>Name:</b> Team Member 1
        <br><b>Location:</b> Lahore
        <br><b>Role:</b> Developer / Designer
    </div>
    <div class="cont11">
        <img id="imga" src="image/img04.jpg" alt="Team Member 2">
        <br><b>Name:</b> Team Member 2
        <br><b>Location:</b> Sahiwal
        <br><b>Role:</b> Project Manager / Developer
    </div>
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
