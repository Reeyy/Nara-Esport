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
      error_reporting(0);
      include 'database/connection.php';
     if(isset($_SESSION['login']) && $_SESSION['login'] == 'failed'){
     echo '  <div class="alert alert-warning" style="position:absolute" id="loginvalid" role="alert">
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
                if (isset($_SESSION['status']) && $_SESSION['status'] == "logged") {
                    echo ' <ul id="nav-menu-container">
    <li class="nav5"><a href="Home.php">Home</a></li>
    <li class="nav4"><a href="Schedule.php">Schedule</a></li>
    <li class="nav3"><a href="Players.php">Players</a></li>
    <li class="nav2"><a href="Teams.php">Team</a></li>';
    if (isset($_SESSION['Role']) && $_SESSION['Role'] == "admin") {
    echo '<li class="nav1"><a href="Admin\dist\index.php">Admin</a></li>';
    }
echo '</ul>';

                ?>
            </nav>
        <?php

                    echo '<a href="database/logout.php"><button class="btnan" id="login-register-button">Log out</button></a>';
                } else {
                    echo '<button id="login-register-button" data-toggle="modal" data-target="#exampleModal">Login / Register</button>';
                }
        ?>
         
        </div>
    </header>

    <main>
        <section id="hero-image">
            <div class="hero-marketing-text">
                <h1 class="animasi">WELCOME TO <span style=" color: #FFB320;">Nara Esport</span> <br>The Best Esport Team</h1>
            </div>
        </section>
        <section id="latest-news">
            <div class="flex">

                <div id="latest-news-container">
                    <div class="latest-news-item">
                        <span class="latest-news-text"></span>
                    </div>
                </div>
                <?php
                $sql = "SELECT * FROM approval  
                WHERE APRV_Account_ID = '{$_SESSION['userid']}'
               ";
                $sql2 = "SELECT * FROM team
                Join esport_player on team.TEAM_ID = esport_player.EPLY_Team_ID 
                WHERE EPLY_Account_ID = '{$_SESSION['userid']}'
               ";
                $sql3 = "SELECT * FROM esport_player
                 WHERE EPLY_Account_ID = '{$_SESSION['userid']}'
                ";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_array($result2);
                $result3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_array($result3);
                if (isset($_SESSION['status']) && $_SESSION['status'] == "logged") {
                    if($row == 0){
                    echo '  <h5 class="join" style="color:#131313"><b>Wanna Join our Team?</b><br>
                <a href="AddCv.php" style="color:white">Click Here!</a>
            </h5>';
                }
                else{
                    if ($row['APRV_Status'] == "Approved" && $row3 != 0){
                        echo '  <h5 class="join" style="color:#131313"><b>Hello '.$row2['EPLY_Nickname'].' !!!<br>
                        ('.$row2['TEAM_Name'].')</b>
                    </h5>';
                    }else if ($row['APRV_Status'] == "Approved") {
                        echo '  <h5 class="join" style="color:#131313"><b>Your Account Under Registration To Team<br>
                    </h5>';
                    }
                    else{
                    echo '  <h5 class="join" style="color:#131313"><b>See your CV</b><br>
                    <a href="Approval.php" style="color:white">Click Here!</a>
                </h5>';}
                }     
                } else {
                    echo '<h5 style="color:#131313"></h5>';
                }
                ?>

            </div>
        </section>

        <section id="game-types-boxes">
            <div class="flex">
                <div class="box new">
                    <div class="shade"></div>
                    <span class="badge new">Valorant</span>
                    <div class="contents">
                        <h4>Valorant Division</h4>
                        <P>Valorant is a free-to-play hero shooter developed and published by Riot Games, for Microsoft Windows. First teased under the codename Project A in October 2019</P>

                    </div>
                </div>

                <div class="box strategy">
                    <div class="shade"></div>
                    <span class="badge strategy">APEX</span>
                    <div class="contents">
                        <h4>Apex Divison</h4>
                        <P>Apex Legends is a free-to-play battle royale game developed by Respawn Entertainment and published by Electronic Arts. It was released for Microsoft Windows, PlayStation 4, and Xbox One in February 2019,</p>

                    </div>
                </div>

                <div class="box rpg">
                    <div class="shade"></div>
                    <span class="badge rpg">LoL</span>
                    <div class="contents">
                        <h4>league of legends</h4>
                        <p>League of Legends is a 2009 multiplayer online battle arena video game developed and published by Riot Games. Inspired by Defense of the Ancients, a custom map for Warcraft III.</p>

                    </div>
                </div>
        </section>

        <section id="recent-games">
            <h1>Our Teams</h1>
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
                        <a href="LolTeam.php"  class="btn btn-yellow" style="margin-bottom: 20px;color:black;font-size:large">Details</a>
                    </div>
                </div>
            </div>
        </section>



        <section id="posts-comments">
        <div class="sponsorbox mx-5">
                        <h3 style="color: white;">Powered by</h3>
                        <div class="row">
                        <div class="col-3 mt-5"> 
                        <img width="200px" height="auto" src="img/rog.png">
                          <div class="row mt-5">
                            <img width="200px" height="auto"  src="img/bca.png" />
                        </div>
                        </div>

                        <div class="col-3 mt-5">
                            <img  width="200px" height="auto" src="https://logodownload.org/wp-content/uploads/2019/12/riot-games-logo.png" />       
                            <div class="row"  style="margin-top:60px">
                            <img width="200px" height="auto" src="img/dg.png" />
                        </div>
                        </div>

                        <div class="col-3 mt-5">
                            <img width="200px" height="auto" src="img/nvidia.png" />
                            <div class="row" style="margin-left:10px;margin-top:90px">
                            <img width="190px" height="auto" src="img/logitech.png" />
                        </div>
                        </div>
                        <div class="col-3">
         
         <div class="game-warrior">

         

       
         <div class="posts-comments-box" >
             <h3>Our Players</h3>
             <div class="post-item">
                 <img src="https://cdn.discordapp.com/attachments/823557637484183592/833306780901572638/hCRgQx0c_400x400.jpg" />
                 <div>
                     <h5>Bagja Yeager</h5>
                     <p>Bagja adalah seorang pro player asal isekai Di divisi Valorant</p>

                 </div>
             </div>

             <div class="post-item">
                 <img src="https://cdn.popbela.com/content-images/post/20210208/mikasa-b43b32273f38f0add1d1c1139cdab9d0.jpg" />
                 <div>
                     <h5>Sakura Hinata</h5>
                     <p>Sakura Hinata adalah Seorang pro player LOL asal dari bogor Bermain di divisi LOL utama</p>

                 </div>
             </div>
             </div>
                        </div>
                        </div>
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

            </ul>
        </div>
    </footer>

    <script>
        document.getElementById('nav-toggle').addEventListener('click', function() {
            let navMenu = document.getElementById('nav-menu-container');
            navMenu.style.display = navMenu.offsetParent === null ? 'block' : 'none';
        });
    </script>
     <!-- Jquery JS-->
     <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
<script>
    $("#loginvalid").fadeTo(2000, 500).slideUp(500, function(){
    $("#loginvalid").slideUp(500);
});
</script>
</body>

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

</html>