<!DOCTYPE html>
<html>

<head>
    <title>Nara Esport/</title>
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
     if(isset($_SESSION['login']) && $_SESSION['login'] == 'failed'){
     echo '  <div class="alert alert-warning" style="position:absolute" id="emailValidation" role="alert">
     Email / Password wrong please re-login !!!
   </div>';
    unset($_SESSION['login']);
    session_destroy();
}
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
        </div>
    </header>




    <main>
        <section id="recent-games">
            <h1 style="margin-bottom: 20px;">Our Teams</h1>
            <div class="flex">
                <div class="box">
                    <span class="badge new">Valorant</span>
                    <img src="img/ValorantLogo.png" />
                    <div class="box-lower-section">
                        <h4> Nara Esport Valorant Team </h4>
                        <p>Nara Esport Valorant Team Di Buat Pada tanggal 14 April 2021.Saat Ini Nara Esport Valorant Team Memiliki 1 Team
                            Click Detail Untuk Lebih Lanjut</p>
                            <a href="ValorantTeam.php" class="btn btn-yellow" style="color:black;font-size:large">Details</a>

                    </div>

                </div>

                <div class="box">
                    <span class="badge racing">Apex</span>
                    <img src="img/APexlogo.png" />
                    <div class="box-lower-section">
                        <h4> Nara Esport Apex Team </h4>
                        <p>Nara Esport Apex Team Di Buat Pada tanggal 14 April 2021.Saat Ini Nara Esport Apex Team Memiliki 1 Team
                            Click Detail Untuk Lebih Lanjut</p>
                            <a href="ApexTeam.php" class="btn btn-yellow" style="color:black;font-size:large">Details</a>
                    </div>
                </div>

                <div class="box">
                    <span class="badge adventure">LOL</span>
                    <img src="img/LolLogo.png" />
                    <div class="box-lower-section">
                        <h4> Nara Esport LOLTeam</h4>
                        <p>Nara Esport LOL Team Di Buat Pada tanggal 14 April 2021.Saat Ini Nara Esport LOL Team Memiliki 1 Team
                            Click Detail Untuk Lebih Lanjut</p>
                            <a href="LolTeam.php" class="btn btn-yellow" style="margin-bottom: 20px;color:black;font-size:large">Details</a>
                    </div>
                </div>
            </div>
        </section>


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
                            <input type="text" required class="form-control" placeholder="Email" name="email" aria-label="email" aria-describedby="basic-addon2">
                        </div>
                        <input type="password" required class="form-control" placeholder="Password" name="pass" aria-label="password" aria-describedby="basic-addon2">
                        <small style="color:white;">dont have account?<a href="JoinPlayer.php" style="color: #FFB320;">click here</a></small>
                        <button type="submit" class="btn btn-lg btn-block mt-3 mb-2" style="background-color: #FFB320;color:#131313;">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="flex">
            <small>Copyright &copy; 2021 All rights reserved | Nara Esport Team </small>
            <ul>
                <li>
                    <a href="#">Home</a>
                </li>

                <li>
                    <a href="#">Games</a>
                </li>

                <li>
                    <a href="#">Blog</a>
                </li>

                <li>
                    <a href="#">Forums</a>
                </li>

                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
    </footer>

    <script>
        document.getElementById('nav-toggle').addEventListener('click', function() {
            let navMenu = document.getElementById('nav-menu-container');
            navMenu.style.display = navMenu.offsetParent === null ? 'block' : 'none';
        });
    </script>
    <style>
    body {
        overflow-x: hidden;
    }

.btn-yellow{
    margin-top: 50px;
    float:right; 
    border-color:#FFB320;
    color:black;
}
.btn-yellow:hover{
    background-color:#FFB320;
    color:white;
}
</style>
</body>

</html>