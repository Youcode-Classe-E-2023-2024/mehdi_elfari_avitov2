<?php
include('connexion.php');
$id = $_GET["id"];
$sql = "delete from users where id = ?";
// Prepare and bind parameters
$stmt = $con->prepare($sql);
$stmt->bind_param('i', $id);

// Execute the update

if ($stmt->execute()) {
    header('location: dash.php');
    exit();
}
