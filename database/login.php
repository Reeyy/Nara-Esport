<?php 
session_start();
include 'connection.php';
 
$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,$_POST['pass']);

$query = "SELECT * FROM account WHERE ACC_Email = '$email'";
$result = mysqli_query($conn, $query);  

$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
           if(mysqli_num_rows($result) > 0) {  
			if (password_verify($_POST['pass'], $row['ACC_Password']) ){  
				$_SESSION["userid"]=$row["ACC_ID"];
				$_SESSION["user_name"]=$row["ACC_Name"];
				$_SESSION['status'] = "logged";
				$_SESSION['Role'] = $row["ACC_Role"];
                if ($row["ACC_Role"] == 'admin') {
                header("location: ../Admin/admin.php");
                }else if ($row["ACC_Role"] == 'user'){
				header("location: ../home.php");
                }
				}else{
					$_SESSION['login'] = "failed";
					header("location: ../Home.php");
			}
		   }
		   else{
			$_SESSION['login'] = "failed";
			header("location: ../Home.php");
			}      
?>