<?php
include('connexion.php');
session_start();

// Redirect to login if admin name is not set
if ($_SESSION['admin_name'] != "admin") {
    header('location: login.php');
    exit(); // Make sure to exit after redirection
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        html,
        body {
            height: 100%;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center">

    <div class="container">
        <div class="text-center">
            <img src="../crudbd/972-1696615885.jpg" alt="User Photo" class="rounded-circle" style="width: 150px; height: 150px;">
            <h2>Hi, Admin</h2>
            <h1>Welcome <span><?php echo $_SESSION["admin_name"]; ?></span></h1>
            <h3>This is the Admin Page</h3>
            <div>
                <a href="index.php" class="btn btn-primary mr-2">Home</a>
                <a href="dash.php" class="btn btn-success mr-2">Dashboard</a>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>