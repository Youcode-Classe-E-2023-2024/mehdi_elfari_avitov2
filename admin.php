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
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }

        .user-photo {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #17a2b8;
        }

        .welcome-msg h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
        }

        .welcome-msg h1 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .welcome-msg h3 {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 30px;
        }

        .btn-container {
            margin-top: 20px;
        }

        /* Style for the 'Admin' text */
        .admin-text {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="container text-center">
        <img src="../crudbd/972-1696615885.jpg" alt="User Photo" class="user-photo">
        <div class="welcome-msg">
            <h2>Hi, <span class="admin-text">Admin</span></h2>
            <h1>Welcome <span><?php echo $_SESSION["admin_name"]; ?></span></h1>
            <h3>This is the Admin Page</h3>
        </div>
        <div class="btn-container">
            <a href="index.php" class="btn btn-primary mr-2">Home</a>
            <a href="dash.php" class="btn btn-success mr-2">Dashboard</a>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>