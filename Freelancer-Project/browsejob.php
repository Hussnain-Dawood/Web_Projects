<?php
session_start();
require('config.php');

// Redirect if not logged in
if (!isset($_SESSION['name'])) {
    header('location:loginpage.php');
    exit();
}

// Connect to database
$db = mysqli_connect('127.0.0.1:3308', 'root', '', 'freelancer_hub') or die("Unable to Connect...");

// Handle search
$sql = "SELECT * FROM jobs";
if (isset($_POST['bsearch'])) {
    $se = mysqli_real_escape_string($db, $_POST['search']);
    $sql = "SELECT * FROM jobs WHERE location='$se'";
}
$result = mysqli_query($db, $sql);

// Set role if not already set
if (!isset($_SESSION['role'])) {
    $username = $_SESSION['name'];
    $res = mysqli_query($db, "SELECT role FROM users WHERE name = '$username' LIMIT 1");
    $row = mysqli_fetch_assoc($res);
    $_SESSION['role'] = $row['role'] ?? 'User';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Browse Jobs</title>
    <style>
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


        form {
            text-align: center;
            padding: 20px;
        }

        .cont {
            display: flex;
            justify-content: space-between;
            margin: 10px auto;
            width: 90%;
            background: rgba(255,255,255,0.95);
            padding: 15px;
            border-radius: 8px;
        }

        .pcont1 {
            flex: 1;
            padding: 10px;
        }

        .spcont {
            display: flex;
            justify-content: space-between;
            padding: 10px 10px 0 10px;
            font-weight: bold;
        }

        .headings {
            display: flex;
            justify-content: space-between;
            margin: 10px auto;
            width: 90%;
            background-color: #0077b6;
            color: white;
            padding: 15px;
            border-radius: 8px;
        }

        .headings div {
            flex: 1;
            font-weight: bold;
            font-size: 16px;
        }

        input.bar {
            padding: 10px;
            width: 250px;
            font-size: 16px;
            margin: 10px 0;
        }

        input.butt {
            padding: 10px 15px;
            background-color: #cc0066;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        input.butt:hover { background-color: #99004d; }

        input.disbutt {
            margin: 3px;
            padding: 5px 10px;
            background-color: #555;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .footer {
            background-color: #333;
            color: white;
            padding: 30px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .container1 { width: 45%; }
    

        hr {
    border: none;
    border-top: 2px dashed#163cc0;
    margin: 30px auto;
    width: 100%;
}
.role {
    text-align: center;
    margin-top: -6px;
    font-weight: bold;
  }
.role:hover
  {
    color:lightblue;
    cursor: pointer;
  }
    </style>
</head>
<body>
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
        <div class="role">
            <img src="image/user.webp" alt="User" width="50" style="border-radius: 50%;">
            <p><?php echo ucfirst($_SESSION['role']); ?></p>
        </div>
    </div>
</header>

<form action="browsejob.php" method="POST">
    <label><b>Search by Location:</b></label>
    <input class="bar" type="text" name="search" placeholder="Enter your location">
    <input type="submit" name="bsearch" value="Apply" class="butt">
    <hr><br>

    <div class="headings">
        <div>Local Jobs</div>
        <div>Start on</div>
        <div>Price</div>
    </div>

    <?php foreach ($result as $r): ?>
        <div class="cont">
            <div class="pcont1">
                <b style="font-size:22px; color:#DAA520;">#<?php echo $r['jid']; ?> - <?php echo $r['topic']; ?></b><br>
                <b>Skills:</b> <?php echo $r['skills']; ?><br>
                <b>Description:</b> <?php echo $r['description']; ?><br>
                <b>Attachments:</b>
                <?php if ($r['document']): ?>
                    <a href="#"><input class="disbutt" type="button" value="View Document"></a>
                <?php endif; ?>
                <?php if ($r['picture']): ?>
                    <a href="#"><input class="disbutt" type="button" value="View Picture"></a>
                <?php endif; ?>
                <br><b>Location:</b> <?php echo $r['location']; ?>
                <div class="spcont">
                    <span><?php echo $r['date']; ?></span>
                    <span><?php echo $r['budget']; ?></span>
                </div>
                <hr>
            </div>
        </div>
    <?php endforeach; ?>
</form>

<div class="footer">
    <div class="container1">
        <h2>Need work done?</h2>
        <p>Post your project and earn money with us. We have thousands of freelance jobs in all categories from programming to design.</p>
    </div>
    <div class="container1">
        <a href="aboutus.php"><button class="butt">About Us</button></a>
        <a href="contact.php"><button class="butt">Contact Us</button></a>
        <h4>Hussnain, Pakistan</h4>
        <p>&copy; 2025</p>
    </div>
</div>
</body>
</html>
