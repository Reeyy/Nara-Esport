<?php

include '../../../database/connection.php';

if (isset($_POST['updatedata'])) {
    $id = $_POST['approvalid'];
    $statusapproval = $_POST['Statusapproval'];
    mysqli_query($conn, "update approval set APRV_ID ='$id',APRV_Status='$statusapproval' where APRV_ID='$id'");


    header("Location:../aproval.php");
}
