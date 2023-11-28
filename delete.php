<?php
include 'connexion.php';
$id = $_GET['id'];
$sql = "DELETE FROM annonces where id = '$id'";
$query = mysqli_query($con, $sql);
if (isset($_GET["admin"])) header("location: dash.php");
else header("location:index.php");
