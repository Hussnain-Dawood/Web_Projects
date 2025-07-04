<?php
require_once 'db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "Invalid ID.";
    exit;
}

$sql = "SELECT * FROM appointments WHERE id = $id";
$result = mysqli_query($conn, $sql);
$appointment = mysqli_fetch_assoc($result);

if (!$appointment) {
    echo "Appointment not found!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Appointment</title>
</head>
<body>
    <h2>Edit Appointment</h2>

    <form method="POST" action="update.php">
        <input type="hidden" name="id" value="<?= $appointment['id'] ?>">

        Full Name: <input type="text" name="full_name" value="<?= $appointment['full_name'] ?>" required><br><br>
        Email: <input type="email" name="email" value="<?= $appointment['email'] ?>" required><br><br>
        Phone: <input type="tel" name="phone" value="<?= $appointment['phone'] ?>" required><br><br>
        DOB: <input type="date" name="dob" value="<?= $appointment['dob'] ?>" required><br><br>

        Gender:
        <select name="gender" required>
            <option value="male" <?= $appointment['gender'] == 'male' ? 'selected' : '' ?>>Male</option>
            <option value="female" <?= $appointment['gender'] == 'female' ? 'selected' : '' ?>>Female</option>
            <option value="other" <?= $appointment['gender'] == 'other' ? 'selected' : '' ?>>Other</option>
            <option value="prefer-not-to-say" <?= $appointment['gender'] == 'prefer-not-to-say' ? 'selected' : '' ?>>Prefer not to say</option>
        </select><br><br>

        Doctor:
        <select name="doctor" required>
            <option value="dr-johnson" <?= $appointment['doctor'] == 'dr-johnson' ? 'selected' : '' ?>>Dr. Johnson</option>
            <option value="dr-chen" <?= $appointment['doctor'] == 'dr-chen' ? 'selected' : '' ?>>Dr. Chen</option>
            <option value="dr-wilson" <?= $appointment['doctor'] == 'dr-wilson' ? 'selected' : '' ?>>Dr. Wilson</option>
            <option value="dr-davis" <?= $appointment['doctor'] == 'dr-davis' ? 'selected' : '' ?>>Dr. Davis</option>
            <option value="dr-park" <?= $appointment['doctor'] == 'dr-park' ? 'selected' : '' ?>>Dr. Park</option>
        </select><br><br>

        Appointment Date: <input type="date" name="appointment_date" value="<?= $appointment['appointment_date'] ?>" required><br><br>
        Appointment Time: <input type="time" name="appointment_time" value="<?= $appointment['appointment_time'] ?>" required><br><br>
        Reason: <textarea name="reason"><?= $appointment['reason'] ?></textarea><br><br>

        <input type="submit" value="Update Appointment">
    </form>
</body>
</html>
