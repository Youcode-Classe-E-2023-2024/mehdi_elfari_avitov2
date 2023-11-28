<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<style>
    .header {
        margin-bottom: 90px;
    }
</style>

<body>
    <?php
    include 'connexion.php';

    $nom = $prenom = $email = "";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        // Using prepared statement to prevent SQL injection
        $stmt = $con->prepare("SELECT * FROM annonces WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nom = $row['nom'];
            $prenom = $row['prenom'];
            $email = $row['email'];
        } else {
            // Handle case where ID doesn't exist
            // You may want to redirect or show an error message
        }
        $stmt->close();
    }
    ?>

    </style>
    <div class="bg-white header">
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="h-8 w-auto" src="https://www.avito.ma/phoenix-assets/imgs/layout/new-logo.svg" alt="">
                    </a>
                </div>
                <div class="flex lg:hidden">
                    <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>

                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <?php if (isset($_GET["login"])) { ?>
                        <a href="login.php" class="text-sm font-semibold leading-6 text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
                    <?php } else {
                        session_unset(); ?>
                        <a href="login.php" class="text-sm font-semibold leading-6 text-gray-900">Log out <span aria-hidden="true">&rarr;</span></a>
                    <?php } ?>
                </div>
            </nav>
            <!-- Mobile menu, show/hide based on menu open state. -->
            <div class="lg:hidden" role="dialog" aria-modal="true">
                <!-- Background backdrop, show/hide based on slide-over state. -->
                <div class="fixed inset-0 z-50"></div>
                <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                    <div class="flex items-center justify-between">
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">Your Company</span>
                            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
                        </a>
                        <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                            <span class="sr-only">Close menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-6 flow-root">
                        <div class="py-6">

                        </div>
                    </div>
                </div>
            </div>
    </div>
    </header>


    </div>


    <div class="flex flex-wrap justify-center">
        <?php
        $requete = "SELECT * FROM annonces";
        $query = mysqli_query($con, $requete);
        $count = 0;
        while ($rows = mysqli_fetch_assoc($query)) {
            $id = $rows['id'];
        ?>
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/3 xl:w-1/3 p-4">
                <div class="bg-white shadow-md rounded-lg p-4">
                    <img src="<?php echo $rows['img']; ?>" alt="Annonce Image" class="w-full h-auto mb-4 rounded">
                    <p class="text-lg font-bold"><?php echo $rows['title']; ?></p>
                    <p class="text-lg font-bold"><?php echo $rows['description']; ?></p>
                    <p><?php echo $rows['price']; ?></p>
                    <div class="mt-4 flex justify-around">
                        <a href='dashboard.php?id=<?php echo $id; ?>' class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Modifier</a>
                        <a href='delete.php?id=<?php echo $id; ?>' class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Supprimer</a>
                    </div>
                </div>
            </div>
        <?php
            $count++;
            // Close the current row and start a new one after every 3 cards
            if ($count % 3 === 0) {
                echo '</div><div class="flex flex-wrap justify-center">';
            }
        }
        if ($count === 0) echo '<div class="flex flex-wrap justify-center">the list is empty</div>';
        ?>


    </div>

</body>

</html>