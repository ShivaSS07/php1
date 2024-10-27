<?php
// Include the database connection file
require_once("dbConnection.php");

// Get id from URL parameter
$id = $_GET['id'];

// Select data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id = $id");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_assoc($result);

$name = $resultData['name'];
$age = $resultData['age'];
$email = $resultData['email'];
$password = $resultData['password'];
$gender = $resultData['gender'];
$phone = $resultData['phone'];
$address = $resultData['address'];
?>
<!DOCTYPE html>
<html lang="en">
<head>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }

        table {
            width: 100%;
            margin-top: 15px;
        }

        td {
            padding: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="tel"],
        input[type="number"] {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        input[type="tel"]:focus,
        input[type="number"]:focus {
            border-color: #5b9bd5;
            outline: none;
        }

        input[type="submit"] {
            background-color: #5b9bd5;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #4a8ac1;
        }

        a {
            text-decoration: none;
            color: #5b9bd5;
            display: block;
            text-align: center;
            margin-top: 15px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Edit Data</h2>
        <p>
            <a href="index.php">Home</a>
        </p>
        
        <form name="edit" method="post" action="editAction.php">
            <table border="0">
                <tr> 
                    <td>Name</td>
                    <td><input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" required></td>
                </tr>
                <tr> 
                    <td>Age</td>
                    <td><input type="number" name="age" value="<?php echo htmlspecialchars($age); ?>" required min="0" max="120"></td>
                </tr>
                <tr> 
                    <td>Email</td>
                    <td><input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required></td>
                </tr>
                <tr> 
                    <td>Password</td>
                    <td><input type="password" name="password" value="<?php echo htmlspecialchars($password); ?>" required></td>
                </tr>
                <tr> 
                    <td>Gender</td>
                    <td><input type="text" name="gender" value="<?php echo htmlspecialchars($gender); ?>" required></td>
                </tr>
                <tr> 
                    <td>Phone</td>
                    <td><input type="tel" name="phone" value="<?php echo htmlspecialchars($phone); ?>" required pattern="^\d{10}$" title="Please enter a valid 10-digit phone number."></td>
                </tr>
                <tr> 
                    <td>Address</td>
                    <td><input type="text" name="address" value="<?php echo htmlspecialchars($address); ?>" required></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                    <td><input type="submit" name="update" value="Update"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
