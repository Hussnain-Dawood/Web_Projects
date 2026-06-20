<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMSATS University Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        header {
            background-color: #0077b5;
            color: white;
            padding: 1px 1px;
            text-align: center;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 100;
        }
        header img {
            display: block;
            margin: 0 auto;
            width: 60px;
        }
        h1 {
            margin: 5px 0;
            font-size: 24px;
        }
        nav {
            background-color: #0077b5;
            margin-top: 0px; /* Adjusted to push content below fixed header */
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            padding: 10px;
            display: inline-block;
        }
        nav ul li a:hover {
            background-color: #005f8c;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header>
        <img src="images/cc1.jpg" alt="COMSATS Logo">
        <h1>COMSATS University Islamabad</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>
