<?php 

include '../../../database/connection.php';
 
if(isset($_POST['updatedata'])){
$id = $_POST['accid'];
$name = $_POST['accname'];
$email = $_POST['accemail'];
$birth = $_POST['accbirth'];
$gender = $_POST['accgender'];
$role = $_POST['accrole'];

mysqli_query($conn,"update account set ACC_Name='$name', ACC_Email='$email', ACC_Birth='$birth',ACC_Gender='$gender',ACC_Role='$role' where ACC_ID='$id'");
header("Location:../account.php");
}
 
?>