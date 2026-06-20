<?php
$conn = new mysqli("localhost", "root", "", "healthcare");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicle_number = trim($_POST["vehicle_number"]);
    $driver_name = trim($_POST["driver_name"]);
    $driver_contact = trim($_POST["driver_contact"]);
    $status = $_POST["status"];
    $location = trim($_POST["location"]);

    if (empty($vehicle_number) || empty($driver_name)) {
        $message = "<p class='error'>Vehicle Number and Driver Name are required!</p>";
    } else {
        $stmt = $conn->prepare("INSERT INTO ambulance_vehicles (vehicle_number, driver_name, driver_contact, status, location) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $vehicle_number, $driver_name, $driver_contact, $status, $location);
        if ($stmt->execute()) {
            $message = "<p class='success'>Ambulance added successfully!</p>";
        } else {
            $message = "<p class='error'>Error: " . $stmt->error . "</p>";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Ambulance Vehicle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f6fb;
            padding: 40px;
        }
        .container {
            max-width: 650px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px #ccc;
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #aaa;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #17a2b8;
            color: white;
            border: none;
            margin-top: 20px;
            padding: 12px;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #117a8b;
        }
        .success {
            color: green;
            margin-top: 15px;
        }
        .error {
            color: red;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Ambulance Vehicle</h2>
        <?= $message ?>
        <form method="POST">
            <label for="vehicle_number">Vehicle Number *</label>
            <input type="text" name="vehicle_number" required>

            <label for="driver_name">Driver Name *</label>
            <input type="text" name="driver_name" required>

            <label for="driver_contact">Driver Contact</label>
            <input type="text" name="driver_contact">

            <label for="status">Status</label>
            <select name="status">
                <option>Available</option>
                <option>On Duty</option>
                <option>Maintenance</option>
            </select>

            <label for="location">Current Location</label>
            <input type="text" name="location">

            <input type="submit" value="Add Ambulance">
        </form>
    </div>
</body>
</html>
