<?php

include '../../../database/connection.php';

if (isset($_POST['updatedata'])) {
    $id = $_POST['scheduleid'];
    $TeamId = $_POST['teamid'];
    $TeamActivity = $_POST['teamactivity'];
    $TeamDate = $_POST['teamdate'];
    $TeamLocation = $_POST['teamlocation'];
    mysqli_query($conn, "update schedule set SCHE_ID='$id',SCHE_Activity='$TeamActivity', SCHE_Date='$TeamDate', SCHE_Location='$TeamLocation' where SCHE_ID ='$id'");

    header("Location:../schedule.php");
}
