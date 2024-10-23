<?php

include 'index.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud operation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="index.php" class="text-light">Add User</a>
    </button>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Sl no</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Password</th>
                <th scope="col">Confirm Password</th>
                <th scope="col">Gender</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
             </tr>
        </thead>
        <tbody>

        <?php

$sql="Select * from `users`";
$result=mysqli_query($con,$sql);
if($result){
   while($row=mysqli_fetch_assoc($result)){
    $id=$row['id'];
    $firstName=$row['first_name'];
    $lastName=$row['last_name'];
    $password=$row['password'];
    $confirmPassword=$row['confirm_password'];
    $email=$row['email'];
    $phone=$row['phone'];
    $address=$row['address'];
    echo ' <tr>
    <th scope="row">'.$id.'</th>
    <td>'.$firstname.'</td>
    <td>'.$lastname.'</td>
    <td>'.$password.'</td>
    <td>'.$confirmPassword.'</td>
    <td>'.$email.'</td>
    <td>'.$phone.'</td>
    <td>'.$address.'</td>
    </tr>';
   }
}







    </div>
</body>
</html>