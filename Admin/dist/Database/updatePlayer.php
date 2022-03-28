<?php

include '../../../database/connection.php';

if (isset($_POST['updatedata'])) {
    $id = $_POST['playerid'];
    $NickName = $_POST['NickName'];
    $TeamId = $_POST['teamid'];
    mysqli_query($conn, "update esport_player set EPLY_Nickname='$NickName',EPLY_Team_ID='$TeamId' where EPLY_ID='$id'");

    header("Location:../player.php");
}
