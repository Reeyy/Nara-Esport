<?php
// include database connection file
include_once("../../../database/connection.php");

// Get id from URL to delete that user
$id = $_GET['id'];

// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM esport_player WHERE EPLY_ID=$id");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:../player.php");
