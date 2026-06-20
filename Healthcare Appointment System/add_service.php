<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "healthcare");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form handling
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $service_name = trim($_POST["service_name"]);
    $description = trim($_POST["description"]);
    $cost = $_POST["cost"];

    if (empty($service_name) || empty($cost)) {
        $message = "<p class='error'>Service name and cost are required!</p>";
    } else {
        $stmt = $conn->prepare("INSERT INTO services (service_name, description, cost) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $service_name, $description, $cost);
        if ($stmt->execute()) {
            $message = "<p class='success'>New service added successfully!</p>";
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
    <title>Add Hospital Service</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            padding: 40px;
        }
        .container {
            max-width: 500px;
            background: white;
            padding: 25px 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
            margin: auto;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
        }
        input[type="text"],
        textarea,
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #aaa;
            border-radius: 4px;
        }
        input[type="submit"] {
            background: #28a745;
            color: white;
            border: none;
            margin-top: 20px;
            padding: 12px;
            width: 100%;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background: #218838;
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
        <h2>Add Hospital Service</h2>
        <?= $message ?>
        <form method="POST">
            <label for="service_name">Service Name *</label>
            <input type="text" name="service_name" required>

            <label for="description">Description</label>
            <textarea name="description" rows="4"></textarea>

            <label for="cost">Cost (PKR) *</label>
            <input type="number" name="cost" step="0.01" required>

            <input type="submit" value="Add Service">
        </form>
    </div>
</body>
</html>
