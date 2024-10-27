<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
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
        input[type="tel"],
        input[type="password"],
        select {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus,
        input[type="password"]:focus,
        select:focus {
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
    <h2>Add Data</h2>
    <p>
        <a href="index.php">Home</a>
    </p>

    <div class="container">
        <form action="addAction.php" method="post" name="add">
            <table>
            <tr> 
    <td>Name</td>
    <td><input type="text" name="name" required maxlength="50" pattern="^[A-Za-z\s]+$" title="Please enter a valid name (letters and spaces only)."></td>
</tr>

                <tr> 
                    <td>Age</td>
                    <td><input type="number" name="age" required min="0" max="120"></td>
                </tr>
                <tr> 
                    <td>Email</td>
                    <td><input type="email" name="email" required></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <select id="gender" name="gender" required>
                            <option value="">Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </td>
                </tr>
                <tr> 
                    <td>Phone</td>
                    <td><input type="tel" name="phone" required pattern="^\d{10}$" title="Please enter a valid 10-digit phone number."></td>
                </tr>
                <tr> 
                    <td>Address</td>
                    <td><input type="text" name="address" required maxlength="100"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" required minlength="6"></td>
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
