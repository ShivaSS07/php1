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
<html>
<head>	
	<title>Edit Data</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Edit Data</h2>
    <p>
	    <a href="index.php">Home</a>
    </p>
	
	<form name="edit" method="post" action="editAction.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name; ?>"></td>
			</tr>
			<tr> 
				<td>Age</td>
				<td><input type="text" name="age" value="<?php echo $age; ?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email; ?>"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input type="text" name="password" value="<?php echo $password; ?>"></td>
			</tr>
			<tr> 
				<td>Gender</td>
				<td><input type="text" name="gender" value="<?php echo $gender; ?>"></td>
			</tr>
			<tr> 
				<td>Phone</td>
				<td><input type="text" name="phone" value="<?php echo $phone; ?>"></td>
			</tr>
			<tr> 
				<td>Address</td>
				<td><input type="text" name="address" value="<?php echo $address; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $id; ?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
