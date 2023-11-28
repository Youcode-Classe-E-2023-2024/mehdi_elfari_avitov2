<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            height: 100vh;
            width: 15rem;
        }

        .sidebar .nav-link:hover {
            color: red !important;
        }

        body {
            background: white !important;
        }

        .table-container {
            margin-top: 20px;
            width: 90%;
        }

        th,
        td {
            text-align: center;
        }

        .btn-link {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="d-flex containerT">
        <div class="sidebar bg-dark">
            <!-- Sidebar content here -->
            <nav class="navbar navbar-dark">
                <a class="navbar-brand" href="index.php">Admin Dashboard</a>
            </nav>
            <ul class="nav flex-column mt-4">
                <li class="nav-item">
                    <a class="nav-link text-white" id="announces-btn" href="#">Annonce</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" id="users-btn" href="#">Users</a>
                </li>
            </ul>
        </div>
        <div class="content table-container cont">
            <!-- Main content here -->
            <h2 class="text-center">Classic Table Design</h2>
            <table class="table table-bordered table-hover announces">

                <thead class="thead-dark">
                    <tr>
                        <th>title</th>
                        <th>description</th>
                        <th>price</th>
                        <th>Actions</th>
                        <th><a href="dashboard.php?id=0">add</a></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    // Assuming $con is your database connection
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "formation";

                    // Create connection
                    $con = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($con->connect_error) {
                        die("Connection failed: " . $con->connect_error);
                    }

                    $sql = "SELECT * FROM annonces";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['title'] . "</td>";
                            echo "<td>" . $row['description'] . "</td>";
                            echo "<td>" . $row['price'] . "</td>";
                            echo "<td>";
                            echo "<a href='update.php?id=" . $row['id'] . "' class='btn btn-info btn-sm mr-2'>Modifier</a>";
                            echo "<a href='delete.php?id=" . $row['id'] . "&admin=true" . "' class='btn btn-danger btn-sm'>Supprimer</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No records found</td></tr>";
                    }
                    $con->close();
                    ?>
                </tbody>
            </table>

            <table class="table table-bordered table-hover users" style="display: none;">

                <thead class="thead-dark">
                    <tr>
                        <th>Firstname</th>
                        <th>Email</th>
                        <th>Actions</th>
                        <th><a href="">add</a></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Assuming $con is your database connection
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "formation";

                    // Create connection
                    $con = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($con->connect_error) {
                        die("Connection failed: " . $con->connect_error);
                    }

                    $sql = "SELECT * FROM users";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['nom'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>";
                            echo "<a href='edit_profil.php?id=" . $row['id'] . "' class='btn btn-info btn-sm mr-2'>Modifier</a>";
                            echo "<a href='delete_profil.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Supprimer</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No records found</td></tr>";
                    }
                    $con->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS, jQuery, Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        let announces = document.querySelector(".announces");
        let users = document.querySelector(".users");

        let announcesBtn = document.querySelector("#announces-btn");
        let usersBtn = document.querySelector("#users-btn");
        console.log(announces.style);
        usersBtn.addEventListener("click", () => {
            announces.style.display = "none";
            users.style.display = "";
        });

        announcesBtn.addEventListener("click", () => {
            users.style.display = "none";
            announces.style.display = "";
        });
    </script>
</body>

</html>