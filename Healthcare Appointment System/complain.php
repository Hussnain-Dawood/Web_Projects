<?php
$insert = false;
$host = "localhost";
$user = "root";
$password = "";
$database = "healthcare";

// Connect to the database
$con = mysqli_connect($host, $user, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert form data if submitted
if (isset($_POST['Name'])) {
    $Name = $_POST['Name'];
    $Age = $_POST['Age'];
    $Gender = $_POST['Gender'];
    $Email = $_POST['Email'];
    $Phone_Number = $_POST['Phone_Number'];
    $Information = $_POST['Information'];

    $sql = "INSERT INTO `contacts` (`Name`, `Age`, `Gender`, `Email`, `Phone_Number`, `Information`, `Date`) 
            VALUES ('$Name', '$Age', '$Gender', '$Email', '$Phone_Number', '$Information', current_timestamp())";

    if (mysqli_query($con, $sql)) {
        $insert = true;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }
        th, td {
            border: 1px solid #444;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <!-- <img class="image" src="images/image.jpg" alt="Health System"> -->
    <div class="container">
        <h1>Contact us</h1>
        <p>Enter your details and submit it.</p>

        <?php if ($insert): ?>
            <p class='submitMsg'>Thanks for submitting your response.</p>
        <?php endif; ?>

        <form action="complain.php" method="post">
            <input type="text" name="Name" placeholder="Enter your Name" required>
            <input type="number" name="Age" placeholder="Enter your Age" required>
            <input type="text" name="Gender" placeholder="Enter your Gender" required>
            <input type="email" name="Email" placeholder="Enter your Email" required>
            <input type="tel" name="Phone_Number" placeholder="xxx-xxxxxxxx" required>
            <textarea name="Information" cols="30" rows="10" placeholder="Enter any Information" required></textarea>
            <button class="btn" type="submit">Submit</button>
        </form>

        <?php
        // Show all records only after form is successfully submitted
        if ($insert) {
            $result = mysqli_query($con, "SELECT * FROM contacts");
            echo "<h2>contact info</h2>";
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Information</th>
                        <th>Date</th>
                    </tr>";
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['Name']}</td>
                            <td>{$row['Age']}</td>
                            <td>{$row['Gender']}</td>
                            <td>{$row['Email']}</td>
                            <td>{$row['Phone_Number']}</td>
                            <td>{$row['Information']}</td>
                            <td>{$row['Date']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No complaints found.</td></tr>";
            }
            echo "</table>";
        }

        mysqli_close($con);
        ?>
    </div>
</body>
</html>
