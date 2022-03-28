<?php
include_once("../../../database/connection.php");
if (isset($_POST['add'])) {
    $TeamId = $_POST['teamid'];
    $TeamActivity = $_POST['teamactivity'];
    $TeamDate = $_POST['teamdate'];
    $TeamLocation = $_POST['teamlocation'];

    $sql = "insert into schedule (SCHE_Team_ID,SCHE_Activity,SCHE_Date,SCHE_Location)
    value ('$TeamId','$TeamActivity','$TeamDate','$TeamLocation')";

    if (mysqli_query($conn, $sql)) {
        header("location:../schedule.php?status=success");
    } else {
        echo "Error : " . $sql . " 
    " . mysqli_error($conn);
    }
}
