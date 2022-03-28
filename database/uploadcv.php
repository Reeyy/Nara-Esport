<?php 
include('connection.php');
session_start();
if(isset($_POST['btnSubmit']))
{
    $temp = $_FILES['pdf']['tmp_name'];
    $name = rand(0,9999).$_FILES['pdf']['name'];
    $size = $_FILES['pdf']['size'];
    $type = $_FILES['pdf']['type'];
    $folder = "uploads/";
    if ($size < 2048000 and ($type =='application/pdf')) {
        move_uploaded_file($temp, $folder . $name);
        mysqli_query($conn, "insert into approval (APRV_Account_ID,APRV_CV,APRV_Status) values ('$_SESSION[userid]','$name','Pending')");
        header("Location:../home.php");
    }else{
        echo "<b>Gagal Upload File</b>";
    }
}
?>