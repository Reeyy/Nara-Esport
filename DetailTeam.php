<!DOCTYPE html>
<html>

<head>
    <title>Nara Esport</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="img/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <header>
        <div class="flex">
            <div class="logo">
            </div>
            <nav>
                <button id="nav-toggle" class="hamburger-menu">
                    <span class="strip"></span>
                    <span class="strip"></span>
                    <span class="strip"></span>
                </button>
                <?php
                session_start();
                include 'database/connection.php';
                if (isset($_SESSION['status']) == "logged") {
                    echo ' <ul id="nav-menu-container">
    <li><a href="Home.php">Home</a></li>
    <li><a href="Schedule.php">Schedule</a></li>
    <li><a href="Players.php">Players</a></li>
    <li><a href="Teams.php">Team</a></li>';
                    if (isset($_SESSION['Role']) && $_SESSION['Role'] == "admin") {
                        echo '<li><a href="Admin\dist\index.php">Admin</a></li>';
                    }
                    echo '</ul>';

                ?>
            </nav>
        <?php
                    echo '<a href="database/logout.php"><button id="login-register-button">Log out</button></a>';
                } else {
                    echo '<button id="login-register-button" data-toggle="modal" data-target="#exampleModal">Login / Register</button>';
                }
        ?>

        <?php
        include 'database/connection.php';
        if (isset($_GET['TEAM_ID'])) {
            $TeamID = $_GET['TEAM_ID'];
            $sql = "SELECT * FROM esport_player
            INNER
            JOIN account
            on account.ACC_ID=esport_player.EPLY_Account_ID 
            INNER
            JOIN team
            on esport_player.EPLY_Team_ID=team.Team_ID
            WHERE EPLY_Team_ID='$TeamID'";
            $result = mysqli_query($conn, $sql);

        ?>

        </div>
    </header>

    <main>

        <div class="limiter">
            <div class="container-table100">
                <div class="wrap-table100">
                    <div class="table100">

                        <table>
                            <thead>
                                <tr class="table100-head">

                                    <th class="column1">Name </th>
                                    <th class="column2">Nick Name</th>
                                    <th class="column2">Email</th>
                                    <th class="column2">Birth Date</th>
                                    <th class="column2">Teamn Name</th>
                                    <th class="column2">Division</th>


                                </tr>
                            </thead>
                            <tbody>
                            <?php

                            if (!$result || mysqli_num_rows($result) == 0) {
                                echo '<tr>
                                                <td class="text-center">Data tidak ditemukan</td>
                                            </tr>';
                            }

                            while ($row = mysqli_fetch_array($result)) {
                                echo '<tr>
                                                
                                                <td class="column1">' . $row['ACC_Name'] . '</td>
                                                <td class="column2">' . $row['EPLY_Nickname'] . '</td>
                                                <td class="column2">' . $row['ACC_Email'] . '</td>
                                                <td class="column2">' . $row['ACC_Birth'] . '</td>
                                                <td class="column2">' . $row['TEAM_Name'] . '</td>
                                                <td class="column2">' . $row['TEAM_Division'] . '</td>
                                            </tr>';
                            }
                        }
                        $conn->close();
                            ?>

                            </tbody>




                        </table>
                    </div>
                </div>
            </div>
        </div>



    </main>

    <footer>
        <div class="flex">
            <small>Copyright &copy; 2021 All rights reserved | Nara Esport Team </small>
            <ul>

            </ul>
        </div>
    </footer>

    <script>
        document.getElementById('nav-toggle').addEventListener('click', function() {
            let navMenu = document.getElementById('nav-menu-container');
            navMenu.style.display = navMenu.offsetParent === null ? 'block' : 'none';
        });
    </script>
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
</body>

</html>