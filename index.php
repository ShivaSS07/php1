<?php
// Include the database connection file
require_once("dbConnection.php");

// Define how many results you want per page
$results_per_page = 5;

// Find out the number of results stored in the database
$result = mysqli_query($mysqli, "SELECT COUNT(id) AS total FROM users");
$row = mysqli_fetch_assoc($result);
$total_results = $row['total'];

// Calculate the number of pages required
$number_of_pages = ceil($total_results / $results_per_page);

// Determine the current page number
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Default to page 1

// Determine the starting limit for the results on the current page
$starting_limit = ($page - 1) * $results_per_page;

// Handle search
$search_query = "";
if (isset($_POST['search'])) {
    $search_query = mysqli_real_escape_string($mysqli, $_POST['search']);
}

// Fetch data with optional search
$query = "SELECT * FROM users WHERE name LIKE '%$search_query%' ORDER BY id DESC LIMIT $starting_limit, $results_per_page";
$result = mysqli_query($mysqli, $query);

if (!$result) {
    die("Database query failed: " . mysqli_error($mysqli));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }

        /* Button Styles */
        .button {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin: 10px 0;
        }
        .button:hover {
            background-color: #2980b9;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Pagination Styles */
        .pagination {
            margin: 20px 0;
            text-align: center;
        }
        .pagination a {
            padding: 8px 12px;
            margin: 0 4px;
            border: 1px solid #3498db;
            color: #3498db;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .pagination a.active {
            background-color: #3498db;
            color: white;
        }
        .pagination a:hover {
            background-color: #2980b9;
            color: white;
        }

        /* Search Box Styles */
        .search-box {
            text-align: center;
            margin-bottom: 20px;
            position: relative;
        }
        .search-box input[type="text"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 220px;
            font-size: 16px;
        }
        .search-suggestions {
            border: 1px solid #ddd;
            max-height: 150px;
            overflow-y: auto;
            position: absolute;
            background-color: white;
            z-index: 1000;
            width: calc(100% - 20px);
            margin-top: 5px;
            border-radius: 4px;
        }
        .search-suggestion {
            padding: 10px;
            cursor: pointer;
        }
        .search-suggestion:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Homepage</h2>
    <p style="text-align: center;">
        <a href="add.php" class="button">Add New Data</a>
    </p>

    <div class="search-box">
        <form method="post" action="">
            <input type="text" id="searchInput" name="search" placeholder="Search by name..." 
                   value="<?php echo htmlspecialchars($search_query); ?>" 
                   onkeyup="showSuggestions(this.value)" autocomplete="off" />
            <input type="submit" value="Search" class="button" />
            <div id="suggestions" class="search-suggestions"></div>
        </form>
    </div>

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
        while ($res = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$res['name']."</td>";
            echo "<td>".$res['age']."</td>";
            echo "<td>".$res['email']."</td>";    
            echo "<td>Protected</td>";
            echo "<td>".$res['gender']."</td>";
            echo "<td>".$res['phone']."</td>";
            echo "<td>".$res['address']."</td>";
            echo "<td>
                <a href=\"edit.php?id=".$res['id']."\" class=\"button\" style=\"background-color: #f39c12; margin-right: 5px;\">Edit</a> 
                <a href=\"delete.php?id=".$res['id']."\" class=\"button\" style=\"background-color: #e74c3c;\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>
            </td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

    <div class="pagination">
    <?php
    $current_page = $_GET['page'] ?? 1; 
    for ($page = 1; $page <= $number_of_pages; $page++) {
        echo '<a href="index.php?page=' . $page . '" class="' . ($page == $current_page ? 'active' : '') . '">' . $page . '</a>';
    }
    ?>
    </div>

    <script>
        function showSuggestions(str) {
            if (str.length === 0) {
                document.getElementById("suggestions").innerHTML = "";
                return;
            }
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("suggestions").innerHTML = this.responseText;
                }
            };
            xhr.open("GET", "fetch_suggestions.php?search=" + encodeURIComponent(str), true);
            xhr.send();
        }

        function selectSuggestion(name) {
            document.getElementById("searchInput").value = name;
            document.getElementById("suggestions").innerHTML = "";
        }
    </script>
</body>
</html>
