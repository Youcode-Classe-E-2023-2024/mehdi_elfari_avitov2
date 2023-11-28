<?php
include 'connexion.php';
$id = $_GET['id'];
$sql = "DELETE FROM annonces where id = '$id'";
$query = mysqli_query($con, $sql);
if (isset($query)) {
    header("location:index.php");
}
