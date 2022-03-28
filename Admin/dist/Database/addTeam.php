<?php
include_once("../../../database/connection.php");
if (isset($_POST['add'])) {
  $TeamName = $_POST['teamname'];
  $Division = $_POST['teamdivision'];

  $sql = "insert into team (TEAM_Name,TEAM_Division)
    value ('$TeamName','$Division')";

  if (mysqli_query($conn, $sql)) {
    header("location:../team.php?status=success");
  } else {
    echo "Error : " . $sql . " 
    " . mysqli_error($conn);
  }
}
