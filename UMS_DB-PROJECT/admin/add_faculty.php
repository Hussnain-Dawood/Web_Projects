<?php
include '../connection.php';
include '../header.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_faculty'])) {
        $faculty_id = $_POST['faculty_id'];
        $name = $_POST['name'];
        $department = $_POST['department'];
        $email = $_POST['email'];

        $sql = "INSERT INTO faculty (faculty_id, name, department, email) VALUES ('$faculty_id', '$name', '$department', '$email')";

        if ($conn->query($sql) === TRUE) {
            $message = "New faculty added successfully";
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['search'])) {
        $searchTerm = $_POST['search_term'];
        $searchResults = [];
        $sql = "SELECT * FROM faculty WHERE faculty_id LIKE '%$searchTerm%' OR name LIKE '%$searchTerm%'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $searchResults[] = $row;
            }
        } else {
            $searchResults = [];
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Faculty - Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }
        #header {
            background-color: #0077b5;
            color: white;
            padding: 10px 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        #main {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin: 20px;
        }
        h2 {
            text-align: center;
            color: #0077b5;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        form input[type="text"],
        form input[type="email"] {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        form input[type="submit"] {
            padding: 10px 20px;
            background-color: #0077b5;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        form input[type="submit"]:hover {
            background-color: #005f8b;
        }
        .back-button {
            display: block;
            width: 80%;
            text-align: center;
            margin: 20px 0;
        }
        .back-button a {
            color: #0077b5;
            text-decoration: none;
            font-size: 16px;
        }
        .back-button a:hover {
            text-decoration: underline;
        }
        .message {
            text-align: center;
            margin: 20px 0;
            color: green;
            font-size: 16px;
        }
        #search-bar {
            text-align: center;
            margin-bottom: 20px;
        }
        #search-bar input[type="text"] {
            padding: 10px;
            font-size: 16px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        #search-bar input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #0077b5;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        #search-bar input[type="submit"]:hover {
            background-color: #005f8b;
        }
        #content {
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
            border-radius: 8px;
            width: 100%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #0077b5;
            color: white;
        }
    </style>
</head>
<body>
    <div id="header">
        <h1>Admin Dashboard</h1>
    </div>
    <div id="main">
        <h2>Add Faculty</h2>
        <?php if ($message): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>
        <form method="post" action="add_faculty.php">
            <input type="text" name="faculty_id" placeholder="Faculty ID" required>
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="department" placeholder="Department" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="submit" name="add_faculty" value="Add Faculty">
        </form>
        <div id="search-bar">
            <form method="post" action="add_faculty.php">
                <input type="text" name="search_term" placeholder="Search by Name or Faculty ID" required>
                <input type="submit" name="search" value="Search">
            </form>
        </div>
        <div class="back-button">
            <a href="javascript:history.back()">Back</a>
        </div>
        <div id="content">
            <?php if (!empty($searchResults)): ?>
                <h3>Search Results:</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Faculty ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($searchResults as $faculty): ?>
                            <tr>
                                <td><?php echo $faculty['faculty_id']; ?></td>
                                <td><?php echo $faculty['name']; ?></td>
                                <td><?php echo $faculty['department']; ?></td>
                                <td><?php echo $faculty['email']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])): ?>
                <p>No results found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
<?php
include '../footer.php';
?>
