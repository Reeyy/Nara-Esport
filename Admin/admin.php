<!DOCTYPE html>
<html>
<?php
session_start();
include '../database/connection.php';
if ($_SESSION['Role'] != "admin") {
    header("location:../Home.php");
}
?>

<head>
    <meta http-equiv="refresh" content="0;url=dist/">
    <title>Nara Esport - Admin</title>
    <script language="javascript">
        window.location.href = "dist/"
    </script>
</head>

<body>
    Go to. <a href="dist/">/dist/index.php</a>
</body>

</html>