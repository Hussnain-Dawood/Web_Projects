<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us - COMSATS University Islamabad</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        #header {
            background-color: #0077b5;
            color: white;
            padding: 10px 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;
            width: 100%;
            z-index: 1000;
        }
        #header h1 {
            margin: 0;
            font-size: 24px;
            display: inline-block;
        }
        #main {
            padding: 120px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 80%;
            margin-top: 20px;
        }
        h2 {
            text-align: center;
            color: #0077b5;
        }
        p {
            text-align: justify;
            font-size: 16px;
            line-height: 1.6;
        }
        .back-button {
            margin-top: 20px;
        }
        .back-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #0077b5;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .back-button a:hover {
            background-color: #005f8b;
        }
    </style>
</head>
<body>
    <div id="header">
    </div>
    <div id="main">
        <h2>About COMSATS University Islamabad</h2>
        <p>
            COMSATS University Islamabad (CUI) is one of the leading higher education institutions in Pakistan. Established in 1998, CUI has grown to become a multi-campus institution with a wide range of academic programs and research initiatives.
        </p>
        <p>
            The university is committed to providing high-quality education and fostering an environment that encourages research and innovation. CUI offers undergraduate, graduate, and doctoral programs in various fields including engineering, information technology, business administration, and social sciences.
        </p>
        <p>
            With a strong emphasis on research, CUI has established numerous research centers and institutes that collaborate with national and international partners. The university aims to contribute to the socio-economic development of Pakistan through its research and educational activities.
        </p>
        <p>
            CUI's mission is to produce competent and confident professionals who can meet the challenges of the modern world. The university is dedicated to promoting knowledge, creativity, and leadership among its students, preparing them for successful careers in their chosen fields.
        </p>
        <p>
            For more information about COMSATS University Islamabad, its programs, and research activities, please visit our official website or contact our admissions office.
        </p>
        <div class="back-button">
            <a href="javascript:history.back()">Back</a>
        </div>
    </div>
</body>
</html>

<?php
include 'footer.php';
?>
