<html>
<head>
	<title>Add Data</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<h2>Add Data</h2>
	<p>
		<a href="index.php">Home</a>
	</p>

	<form action="addAction.php" method="post" name="add">
		<table width="25%" border="0">
		<div class="container">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" required="></td>
			</tr>
			<tr> 
				<td>Age</td>
				<td><input type="text" name="age"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="email" name="email"></td>
			</tr>
			<tr>
				<td>gender</td>
				<td> <select id="gender" name="gender" required>
				<option value="Select">Select</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
</td>
<tr> 
				<td>phone</td>
				<td><input type="tel" name="phone"></td>
			</tr>
			<tr> 
				<td>Address</td>
				<td><input type="text" name="address"></td>
			</tr>
</tr>
<tr>
				<td>password</td>
				<td><input type="password" name="password"></td>
</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="submit" value="Add"></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>

