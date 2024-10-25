<?php
// Include the database connection file
require_once("dbConnection.php");

// Fetch data in descending order (latest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");

if (!$result) {
    die("Database query failed: " . mysqli_error($mysqli));
}
?>

<html>
<head>    
    <title>Homepage</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        h2 {
            text-align: center;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            color: #3498db;
        }
        a:hover {
            text-decoration: underline;
        }
        .dataTables_wrapper {
            margin: 20px;
        }
    </style>
</head>

<body>
    <h2>Homepage</h2>
    <p style="text-align: center;">
        <a href="add.php" style="padding: 10px; background-color: #3498db; color: white; border-radius: 5px;">Add New Data</a>
    </p>
    <table id="datatableid">
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Email</th>
                <th>Password</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Fetch the next row of a result set as an associative array
        while ($res = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$res['name']."</td>";
            echo "<td>".$res['age']."</td>";
            echo "<td>".$res['email']."</td>";    
            echo "<td>Protected</td>"; // Change for security
            echo "<td>".$res['gender']."</td>";
            echo "<td>".$res['phone']."</td>";
            echo "<td>".$res['address']."</td>";
            echo "<td>
                <a href=\"edit.php?id=".$res['id']."\"><i class='fas fa-edit'></i> Edit</a> | 
                <a href=\"delete.php?id=".$res['id']."\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class='fas fa-trash'></i> Delete</a>
            </td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

    <script>
    $(document).ready(function () {
        $('#datatableid').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "lengthMenu": [5, 10, 25, 50],
            "pageLength": 10,
            "language": {
                "search": "Search records:",
                "lengthMenu": "Show _MENU_ entries",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "Next",
                    "previous": "Previous"
                }
            }
        });
    });
    </script>
</body>
</html>
