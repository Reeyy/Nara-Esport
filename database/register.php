<?php
      include_once 'connection.php';
        $name =  $_POST["name"] ;
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $date1 = strtr($_POST["birthday"], '/', '-');
        $date2 = date('Y-m-d', strtotime($date1));
        $gender =  $_POST["gender"];
        

        $user_check = mysqli_num_rows(mysqli_query($conn,"select * from account where ACC_Email = '$email'"));
                               
        if($user_check > 0) {
          session_start();
          $_SESSION['validation'] = 'failed';
          header( "Location:../JoinPlayer.php" );
            }else{
            $sql = "insert into account (ACC_Name,ACC_Email,ACC_Password,ACC_Birth,ACC_Gender,ACC_Role)
            values ('$name','$email','$hash',' $date2','$gender','user')";                                   
            if (mysqli_multi_query($conn,$sql)){
            header( "Location:../Home.php" ); die;
            } else { 
            echo "Error : " . $sql . " 
            " .mysqli_error($conn);
            }
            mysqli_close($conn);
            }   
?>