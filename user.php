<?php
include('connexion.php');
session_start();

if (!isset($_SESSION['user_name'])) {
    // header('location:login.php');
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
            <h2>Hi, User</h2>
            <h1>Welcome <span><?php echo $_SESSION['user_name']; ?></span></h1>
            <h3>This is the User Page</h3>
            <div>
                <a href="login.php" class="btn btn-primary mr-2">Login</a>
                <a href="register.php" class="btn btn-success mr-2">Register</a>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>