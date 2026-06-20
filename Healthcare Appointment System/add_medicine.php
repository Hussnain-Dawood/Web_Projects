<?php
$conn = new mysqli("localhost", "root", "", "healthcare");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["medicine_name"]);
    $desc = trim($_POST["description"]);
    $qty = (int) $_POST["quantity"];
    $price = (float) $_POST["price"];
    $expiry = $_POST["expiry_date"];

    if (empty($name) || $qty <= 0 || $price <= 0 || empty($expiry)) {
        $message = "<p class='error'>All fields except description are required and must be valid!</p>";
    } else {
        $stmt = $conn->prepare("INSERT INTO pharmacy (medicine_name, description, quantity, price, expiry_date) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssids", $name, $desc, $qty, $price, $expiry);
        if ($stmt->execute()) {
            $message = "<p class='success'>Medicine added successfully!</p>";
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
    <title>Add Pharmacy Item</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8fafc;
            padding: 40px;
        }
        .container {
            max-width: 600px;
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
        input[type="number"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #aaa;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            margin-top: 20px;
            padding: 12px;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
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
        <h2>Add Medicine to Pharmacy</h2>
        <?= $message ?>
        <form method="POST">
            <label for="medicine_name">Medicine Name *</label>
            <input type="text" name="medicine_name" required>

            <label for="description">Description</label>
            <textarea name="description" rows="3"></textarea>

            <label for="quantity">Quantity *</label>
            <input type="number" name="quantity" min="1" required>

            <label for="price">Price (PKR) *</label>
            <input type="number" name="price" step="0.01" required>

            <label for="expiry_date">Expiry Date *</label>
            <input type="date" name="expiry_date" required>

            <input type="submit" value="Add Medicine">
        </form>
    </div>
</body>
</html>
