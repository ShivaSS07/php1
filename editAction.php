<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['update'])) {
	// Escape special characters in a string for use in an SQL statement
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);	
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);
	$gender = mysqli_real_escape_string($mysqli, $_POST['gender']);
	$phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
	$address = mysqli_real_escape_string($mysqli, $_POST['address']);
	
	
	// Check for empty fields
	if (empty($name) || empty($age) || empty($email) || empty($password) || empty($gender) || empty($phone) || empty($address)) {
		if (empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if (empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if (empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		if (empty($password)) {
			echo "<font color='red'>password field is empty.</font><br/>";
		}
		if (empty($gender)) {
			echo "<font color='red'>gender field is empty.</font><br/>";
		}
		if (empty($phone)) {
			echo "<font color='red'>phone field is empty.</font><br/>";
		}
		if (empty($address)) {
			echo "<font color='red'>address field is empty.</font><br/>";
		}
	} else {
		// Update the database table
		$result = mysqli_query($mysqli, "UPDATE users SET `name` = '$name', `age` = '$age', `email` = '$email', `password` = '$password',`gender` = '$gender',`phone` = '$phone',`address` = '$address' WHERE `id` = $id");
		
		// Display success message
		echo "<p><font color='green'>Data updated successfully!</p>";
		echo "<a href='index.php'>View Result</a>";
	}
}
