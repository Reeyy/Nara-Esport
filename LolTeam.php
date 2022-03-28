<!DOCTYPE html>
<html>

<head>
    <title>Nara Esport</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="Stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body>
    <header>
        <div class="flex">
            <?php
            session_start();
            if (isset($_SESSION['login']) && $_SESSION['login'] == 'failed') {
                echo '  <div class="alert alert-warning" style="position:absolute" id="emailValidation" role="alert">
     Email / Password wrong please re-login !!!
   </div>';
                unset($_SESSION['login']);
                session_destroy();
            }
            ?>

            <?php

            $TeamValo_ID = "League of Legends";
            include 'database/connection.php';
            $sql = "SELECT * FROM team
            WHERE TEAM_Division='$TeamValo_ID'";
            $result = mysqli_query($conn, $sql);

            ?>

            <div class="logo">
            </div>
            <nav>
                <button id="nav-toggle" class="hamburger-menu">
                    <span class="strip"></span>
                    <span class="strip"></span>
                    <span class="strip"></span>
                </button>
                <?php
                include 'database/connection.php';
                if (isset($_SESSION['status']) && $_SESSION['status'] == "logged") {
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
                                    <th class="column1">Team id</th>
                                    <th class="column2">Team Name</th>
                                    <th class="column3">Divison</th>
                                    <th class="column1">Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($result) == 0) {
                                    echo '<tr>
                                                <td class="text-center">Data tidak ditemukan</td>
                                            </tr>';
                                }
                                while ($row = mysqli_fetch_array($result)) {
                                    echo '<tr>
                                                <td class="column1">' . $row['TEAM_ID'] . '</td>
                                                <td class="column2">' . $row['TEAM_Name'] . '</td>
                                                <td class="column3">' . $row['TEAM_Division'] . '</td>
                                                <td class="column1">
                                                    <a href="DetailTeam.php?TEAM_ID=' . $row['TEAM_ID'] . '" class="btn btn-primary btn-sm" style="color: white;">Detail</a>
                                                </td>
                                            </tr>';
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: #252525;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:white">Login</h5>
                    <button type="button" class="close" style="color:white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mt-3">
                    <form action="database/login.php" method="POST">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Email" name="email" aria-label="email" aria-describedby="basic-addon2">
                        </div>
                        <input type="password" required class="form-control" placeholder="Password" name="pass" aria-label="password" aria-describedby="basic-addon2">
                        <small style="color:white;">dont have account?<a href="JoinPlayer.php" style="color: #FFB320;">click here</a></small>
                        <button type="submit" required class="btn btn-lg btn-block mt-3 mb-2" style="background-color: #FFB320;color:#131313;">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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

</body>

</html>