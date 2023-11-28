<?php
include 'connexion.php';
if (isset($_GET['id'])) {
    $title = $_POST['product_title'];
    $description = $_POST['product_description'];
    $price = $_POST['product_price'];
    $id = $_POST['id'];

    $sql = "UPDATE annonces SET title = '$title', description = '$description', price = '$price' WHERE id = '$id'";

    $q = mysqli_query($con, $sql);
    if (isset($q)) {
        echo "<h1>MODIFICATION AVEC SUCCESS</h1>";
    }
} else {
    $title = $_POST['product_title'];
    $description = $_POST['product_description'];
    $price = $_POST['product_price'];


    move_uploaded_file($product_picture_tmp, "./img/$product_picture_name");

    $requete = "INSERT INTO annonces (title,description,price) VALUES('$title','$description','$price')";
    $res = mysqli_query($con, $requete);
    if ($res) {
        // echo "<h1>INSERTION AVEC SUCCESS</h1>";
        header('Location:dash.php');
    } else {
        echo "<h1>Erruer</h1>";
    }
}
