<?php

include '../../../database/connection.php';

if (isset($_POST['updatedata'])) {
    $id = $_POST['teamid'];
    $name = $_POST['teamname'];
    $division = $_POST['teamdivision'];
    mysqli_query($conn, "update team set TEAM_Name='$name', TEAM_Division='$division' where TEAM_ID='$id'");

    header("Location:../team.php");
}
