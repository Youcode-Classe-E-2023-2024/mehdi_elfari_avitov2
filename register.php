<?php
include 'connexion.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['nom']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $user_type = $_POST['role'];

    // Check if passwords match
    if ($password != $confirm_password) {
        $error[] = 'Password not matched!';
    } else {
        // Hash the password securely
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Check if the email already exists in the database
        $check_existing_user = "SELECT * FROM users WHERE email ='$email'";
        $result = mysqli_query($con, $check_existing_user);

        if (mysqli_num_rows($result) > 0) {
            $error[] = 'User already exists!';
        } else {
            // Insert the new user data into the database
            $insert = "INSERT INTO users (nom, email, password, role) VALUES ('$name', '$email', '$hashed_password', '$user_type')";
            $query_result = mysqli_query($con, $insert);

            if ($query_result) {
                header('location: login.php?login=true');
                exit();
            } else {
                $error[] = 'Error inserting user data!';
            }
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <style>
        .error-msg {
            margin: 10px 0;
            display: block;
            background: crimson;
            color: while;
            border-radius: 5px;
            font-size: 20px;
            padding: 5px;
        }
    </style>
    <div class="min-h-screen flex justify-center items-center">
        <div class="bg-white p-8 rounded shadow-md max-w-md w-full">
            <h1 class="text-3xl font-bold mb-6 text-center">Register Now</h1>
            <?php
            if (isset($error)) {
                foreach ($error as $errorMsg) {
                    echo '<span class="error-msg">' . $errorMsg . '</span>';
                }
            }
            ?>
            <form method="post" action="register.php">
                <div class="space-y-6">
                    <div>
                        <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                        <input type="text" name="nom" id="nom" placeholder="Entrer le nom" autocomplete="street-address" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-indigo-500">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" placeholder="Entrer le email" autocomplete="address-level2" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-indigo-500">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                        <input type="password" name="password" id="password" placeholder="Entrer le mot de passe" autocomplete="new-password" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-indigo-500">
                    </div>
                    <div>
                        <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirmation du mot de passe</label>
                        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirmer le mot de passe" autocomplete="new-password" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-indigo-500">
                    </div>
                    <div>
                        <label for="role" class="block text-sm font-medium text-gray-700">Rôle</label>
                        <select name="role" id="role" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-indigo-500">
                            <option value="admin">Annonceur</option>
                            <option value="user">Achteur</option>
                        </select>
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <button type="button" class="text-sm font-semibold text-gray-700 mr-4">Cancel</button>
                    <button type="submit" name="submit" value="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">Register</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>