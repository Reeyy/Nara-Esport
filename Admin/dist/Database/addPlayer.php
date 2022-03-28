<?php
include_once("../../../database/connection.php");
if (isset($_POST['add'])) {
    $NickName = $_POST['NickName'];
    $TeamId = $_POST['teamid'];
    $accnId = $_POST['accnid'];
   

    $sql = "insert into esport_player (EPLY_Account_ID,EPLY_Nickname,EPLY_Team_ID)
    value ('$accnId','$NickName','$TeamId')";

    if (mysqli_query($conn, $sql)) {
        header("location:../player.php?status=success");
    } else {
        echo "Error : " . $sql . " 
    " . mysqli_error($conn);
    }
}
