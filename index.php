<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb"; // Your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$errorMsg = '';
$successMsg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $firstName = mysqli_real_escape_string($conn, $_POST['first_name']);
    $lastName = mysqli_real_escape_string($conn, $_POST['last_name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $agreement = isset($_POST['agreement']);

    // Validate input
    if (empty($firstName) || empty($lastName) || empty($password) || empty($confirmPassword) || 
        empty($email) || empty($phone) || empty($gender) || empty($address) || !$agreement) {
        $errorMsg = 'All fields are required and you must accept the agreement.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = 'Invalid email format.';
    } elseif ($password !== $confirmPassword) {
        $errorMsg = 'Passwords do not match.';
    } else {
        // Hash the password before storing
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert data into database
        $sql = "INSERT INTO users (first_name, last_name, password, email, phone, gender, address)
                VALUES ('$firstName', '$lastName', '$hashedPassword', '$email', '$phone', '$gender', '$address')";

        if (mysqli_query($conn, $sql)) {
            $successMsg = 'Registration successful!';
        } else {
            $errorMsg = 'Error: ' . mysqli_error($conn);
        }
    }
}
?>

<div class="form-container">
    <h2>Register</h2>

    <?php if ($errorMsg): ?>
        <p class="error"><?php echo $errorMsg; ?></p>
    <?php endif; ?>

    <?php if ($successMsg): ?>
        <p class="success"><?php echo $successMsg; ?></p>
    <?php endif; ?>

    <form action="" method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option><
        </select><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required><br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>

        <label>
            <input type="checkbox" name="agreement" required> I accept the terms and conditions
        </label><br><br>

        <button type="submit">Register</button>
    </form>
</div>

</body>
</html>

<?php
// Close the connection
mysqli_close($conn);
?>