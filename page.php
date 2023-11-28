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
    $img = file_get_contents($_FILES['product_picture']["tmp_name"]);

    $requete = "INSERT INTO annonces (title, description, price, img) VALUES (?, ?, ?, ?)";

    // Prepare the statement
    $stmt = mysqli_prepare($con, $requete);

    // Bind parameters and execute the statement
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssis", $title, $description, $price, $img);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        // echo "<h1>INSERTION AVEC SUCCESS</h1>";
        header('Location:dash.php');
    } else {
        echo "<h1>Erruer</h1>";
    }
}
