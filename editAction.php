<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .message {
            padding: 10px;
            border-radius: 4px;
            margin: 20px 0;
            text-align: center;
        }
        .success {
            background-color: #dff0d8;
            color: #3c763d;
        }
        .error {
            background-color: #f2dede;
            color: #a94442;
        }
        .error-list {
            text-align: left;
            margin-top: 10px;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            margin-top: 10px;
        }
        a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Update Data</h2>
    <?php
    // Include the database connection file
    require_once("dbConnection.php");

    if (isset($_POST['update'])) {
        // Escape special characters in string for use in SQL statement
        $id = mysqli_real_escape_string($mysqli, $_POST['id']);
        $name = mysqli_real_escape_string($mysqli, $_POST['name']);
        $age = mysqli_real_escape_string($mysqli, $_POST['age']);
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);    
        $password = mysqli_real_escape_string($mysqli, $_POST['password']);
        $gender = mysqli_real_escape_string($mysqli, $_POST['gender']);
        $phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
        $address = mysqli_real_escape_string($mysqli, $_POST['address']);
        
        // Initialize an error message array
        $error_messages = [];

        // Check for empty fields
        if (empty($name)) {
            $error_messages[] = "Name field is empty.";
        }
        if (empty($age)) {
            $error_messages[] = "Age field is empty.";
        }
        if (empty($email)) {
            $error_messages[] = "Email field is empty.";
        }
        if (empty($password)) {
            $error_messages[] = "Password field is empty.";
        }
        if (empty($gender)) {
            $error_messages[] = "Gender field is empty.";
        }
        if (empty($phone)) {
            $error_messages[] = "Phone field is empty.";
        }
        if (empty($address)) {
            $error_messages[] = "Address field is empty.";
        }

        // Display error messages if there are any
        if (!empty($error_messages)) {
            echo '<div class="message error">';
            echo '<strong>Error!</strong>';
            echo '<ul class="error-list">';
            foreach ($error_messages as $error) {
                echo "<li>$error</li>";
            }
            echo '</ul>';
            echo '</div>';
        } else {
            // Update the database table
            $result = mysqli_query($mysqli, "UPDATE users SET `name` = '$name', `age` = '$age', `email` = '$email', `password` = '$password', `gender` = '$gender', `phone` = '$phone', `address` = '$address' WHERE `id` = $id");

            // Display success message
            echo '<div class="message success">';
            echo '<strong>Success!</strong> Data updated successfully!';
            echo '</div>';
            echo '<a href="index.php">View Result</a>';
        }
    }
    ?>
</div>

</body>
</html>
